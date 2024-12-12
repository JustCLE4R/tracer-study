<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Pekerja;
use App\Models\Wirausaha;
use App\Models\Pendidikan;
use App\Models\Questioner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\QuestionerStakeHolder;

class VisualisasiController extends Controller
{
    public function dataWirausaha(Request $request){
        $wirausaha_data = Wirausaha::with('user')
                                    ->whereHas('user.certcheck', function($query) {
                                    $query->where('profile_check', true)
                                        ->where('perjalanan_karir_check', true)
                                        ->where('questioner_check', true)
                                        ->where('role', 'mahasiswa');
                                    })
                                    ->get();

        $wirausaha_data = $this->filterByThnWisudahProdiFakultas($wirausaha_data, $request->query('lulus'), $request->query('fakultas'), $request->query('prodi'));

        $pemodal_counts = [
            "Pribadi / Tabungan" => 0,
            "Bank" => 0,
            "Keluarga" => 0,
            "Investor" => 0
        ];

        foreach ($wirausaha_data as $wirausaha) {
            $pemodal = json_decode($wirausaha->pemodal);
            if ($pemodal) {
                foreach ($pemodal as $option) {
                    switch ($option) {
                        case 'a':
                            $pemodal_counts["Pribadi / Tabungan"]++;
                            break;
                        case 'b':
                            $pemodal_counts["Bank"]++;
                            break;
                        case 'c':
                            $pemodal_counts["Keluarga"]++;
                            break;
                        case 'd':
                            $pemodal_counts["Investor"]++;
                            break;
                        default:
                            break;
                    }
                }
            }
        }

        $is_active_counts = $wirausaha_data->countBy('is_active');
        $tingkat_tempat_usaha_counts = $wirausaha_data->countBy('tingkat_tempat_usaha');
        $bidang_usaha_counts = $wirausaha_data->countBy('bidang_usaha');
        $omset_counts = $this->moneyRange($wirausaha_data, 'omset');
        $pendapatan_counts = $this->moneyRange($wirausaha_data, 'pendapatan');
        $tgl_mulai_usaha_counts = $this->dateRange($wirausaha_data, 'tgl_mulai_usaha');
        $tgl_akhir_usaha_counts = $this->dateRange($wirausaha_data, 'tgl_akhir_usaha');
        $kesesuaian_counts = $wirausaha_data->countBy('kesesuaian');

        return response()->json([
            'is_active' => $is_active_counts,
            'Tingkat / Ukuran Tempat Usaha' => $tingkat_tempat_usaha_counts,
            'Pemodal Usaha' => $pemodal_counts,
            'Bidang Usaha' => $bidang_usaha_counts,
            'Omset' => $omset_counts,
            'Pendapatan' => $pendapatan_counts,
            'Tanggal Mulai Usaha' => $tgl_mulai_usaha_counts,
            'Tanggal Akhir Usaha' => $tgl_akhir_usaha_counts,
            'Kesesuaian Usaha dengan Prodi' => $kesesuaian_counts,
        ]);
    }

    public function dataPekerja(Request $request){
        $pekerja_data = Pekerja::with('user')
                                ->whereHas('user.certcheck', function($query) {
                                $query->where('profile_check', true)
                                    ->where('perjalanan_karir_check', true)
                                    ->where('questioner_check', true)
                                    ->where('role', 'mahasiswa');
                                })
                                ->get();

        $pekerja_data = $this->filterByThnWisudahProdiFakultas($pekerja_data, $request->query('lulus'), $request->query('fakultas'), $request->query('prodi'));

        return [
            'is_active' => $pekerja_data->countBy('is_active'),
            'Status Pekerjaan' => $pekerja_data->countBy('status_pekerjaan'),
            'Kriteria Pekerjaan' => $pekerja_data->countBy('kriteria_pekerjaan'),
            'Bidang Pekerjaan' => $pekerja_data->countBy('bidang_pekerjaan'),
            'Tingkat / Ukuran Tempat Bekerja' => $pekerja_data->countBy('tingkat_tempat_bekerja'),
            'Jabatan Pekerjaan' => $pekerja_data->countBy('jabatan_pekerjaan'),
            'Pendapatan' => $this->moneyRange($pekerja_data, 'pendapatan'),
            'Kesesuaian Pekerjaan dengan Prodi' => $pekerja_data->countBy('kesesuaian'),
            'Tgl Mulai Kerja' => $this->dateRange($pekerja_data, 'tgl_mulai_kerja'),
            'Tgl Akhir Kerja' => $this->dateRange($pekerja_data, 'tgl_akhir_kerja'),
        ];
    }

    public function dataPendidikan(Request $request){
        $pendidikan_data = Pendidikan::with('user')
                                    ->whereHas('user.certcheck', function($query) {
                                    $query->where('profile_check', true)
                                        ->where('perjalanan_karir_check', true)
                                        ->where('questioner_check', true)
                                        ->where('role', 'mahasiswa');
                                    })
                                    ->get();

        $pendidikan_data = $this->filterByThnWisudahProdiFakultas($pendidikan_data, $request->query('lulus'), $request->query('fakultas'), $request->query('prodi'));

        $negara = $pendidikan_data->map(function($item){
            if($item->negara_pendidikan == "Indonesia"){
                return "Dalam Negeri";
            }else{
                return "Luar Negeri";
            }
        })->countBy();

        return response()->json([
            'is_studying' => $pendidikan_data->countBy('is_studying'),
            'Tingkat Pendidikan' => $pendidikan_data->countBy('tingkat_pendidikan'),
            'Tgl Surat Penerimaan Pendidikan' => $this->dateRange($pendidikan_data, 'tgl_surat_penerimaan_pendidikan'),
            'Tgl Mulai Pendidikan' => $this->dateRange($pendidikan_data, 'tgl_mulai_pendidikan'),
            'Negara Pendidikan' => $negara,
            'provinsi_pendidikan' => $pendidikan_data->whereNotNull('provinsi_pendidikan')->countBy('provinsi_pendidikan'),
            'kabupaten_pendidikan' => $pendidikan_data->whereNotNull('kabupaten_pendidikan')->countBy('kabupaten_pendidikan'),
            'Satu Linear' => $pendidikan_data->countBy('is_linear'),
        ]);
    }

    public function dataQuestioner(Request $request){
        $questioner_data = Questioner::with('user')
                                    ->whereHas('user.certcheck', function($query) {
                                    $query->where('profile_check', true)
                                        ->where('perjalanan_karir_check', true)
                                        ->where('questioner_check', true)
                                        ->where('role', 'mahasiswa');
                                    })
                                    ->get();

        $questioner_data = $this->filterByThnWisudahProdiFakultas($questioner_data, $request->query('lulus'), $request->query('fakultas'), $request->query('prodi'));

        return response()->json([
            '(a) Seberapa besar kompetensi di bawah ini Anda kuasai?' => [
                'Ketaqwaan terhadap Tuhan yang maha Esa' => $questioner_data->countBy('a_1') ?: 0,
                'Etika dan kecerdasan dalam bertindak' => $questioner_data->countBy('a_2'),
                'Kemampuan bahasa asing (bahasa Inggris, bahasa Arab)' => $questioner_data->countBy('a_3'),
                'Ketrampilan internet dan computer' => $questioner_data->countBy('a_4'),
                'Kemampuan belajar' => $questioner_data->countBy('a_5'),
                'Kemampuan berkomunikasi' => $questioner_data->countBy('a_6'),
                'Bekerja dalam tim/bekerjasama dengan orang lain' => $questioner_data->countBy('a_7'),
                'Kemampuan dalam memecahkan masalah' => $questioner_data->countBy('a_8'),
                'Inovasi dan/atau kreatifitas' => $questioner_data->countBy('a_9'),
                'Pengetahuan di bidang atau disiplin ilmu anda' => $questioner_data->countBy('a_10'),
                'Pengetahuan di luar bidang atau disiplin ilmu anda' => $questioner_data->countBy('a_11'),
                'Keseimbangan antara pikir dan zikir' => $questioner_data->countBy('a_12'),
                'Mampu melakukan pendekatan integral-transdisipliner' => $questioner_data->countBy('a_13'),
                'Memiliki etos dinamis dan berkarakter pengabdi' => $questioner_data->countBy('a_14'),
                'Berakhlak mulia' => $questioner_data->countBy('a_15'),
                'Pengetahuan umum dan memiliki wawasan kebangsaan' => $questioner_data->countBy('a_16'),
                'Bervisi pengembangan peradaban' => $questioner_data->countBy('a_17'),
                'Berpenampilan happy / Bahagia' => $questioner_data->countBy('a_18'),
            ],

            '(b) Seberapa besar kontribusi perguruan tinggi terhadap kompetensi yang Anda kuasai?' => [
                'Ketaqwaan terhadap Tuhan yang maha Esa' => $questioner_data->countBy('b_1'),
                'Etika dan kecerdasan dalam bertindak' => $questioner_data->countBy('b_2'),
                'Kemampuan bahasa asing (bahasa Inggris, bahasa Arab)' => $questioner_data->countBy('b_3'),
                'Ketrampilan internet dan computer' => $questioner_data->countBy('b_4'),
                'Kemampuan belajar' => $questioner_data->countBy('b_5'),
                'Kemampuan berkomunikasi' => $questioner_data->countBy('b_6'),
                'Bekerja dalam tim/bekerjasama dengan orang lain' => $questioner_data->countBy('b_7'),
                'Kemampuan dalam memecahkan masalah' => $questioner_data->countBy('b_8'),
                'Inovasi dan/atau kreatifitas' => $questioner_data->countBy('b_9'),
                'Pengetahuan di bidang atau disiplin ilmu anda' => $questioner_data->countBy('b_10'),
                'Pengetahuan di luar bidang atau disiplin ilmu anda' => $questioner_data->countBy('b_11'),
                'Keseimbangan antara pikir dan zikir' => $questioner_data->countBy('b_12'),
                'Mampu melakukan pendekatan integral-transdisipliner' => $questioner_data->countBy('b_13'),
                'Memiliki etos dinamis dan berkarakter pengabdi' => $questioner_data->countBy('b_14'),
                'Berakhlak mulia' => $questioner_data->countBy('b_15'),
                'Pengetahuan umum dan memiliki wawasan kebangsaan' => $questioner_data->countBy('b_16'),
                'Berpenampilan happy / Bahagia' => $questioner_data->countBy('b_17'),
                'Bervisi pengembangan peradaban' => $questioner_data->countBy('b_18'),
            ],

            '(c) Peningkatan kompetensi yang anda peroleh didapat paling banyak dari:' =>[
                'Peningkatan kompetensi yang anda peroleh didapat paling banyak dari:' => $questioner_data->countBy('c_1'),
            ],

            '(d) Seberapa besar penekanan pada aspek-aspek pembelajaran di bawah ini dilaksanakan di program studi Anda?' => [
                'Perkuliahan' => $questioner_data->countBy('d_1'),
                'Demonstrasi/peragaan pembelajaran' => $questioner_data->countBy('d_2'),
                'Partisipasi dalam proyek riset' => $questioner_data->countBy('d_3'),
                'Diskusi' => $questioner_data->countBy('d_4'),
                'Magang' => $questioner_data->countBy('d_5'),
            ],

            '(e) Bagaimana penilaian Anda terhadap aspek belajar mengajar di bawah ini?' => [
                'Kesempatan untuk berinteraksi dengan dosen-dosen di luar jadwal kuliah' => $questioner_data->countBy('e_1'),
                'Bimbingan akademik' => $questioner_data->countBy('e_2'),
                'Variasi mata kuliah' => $questioner_data->countBy('e_3'),
                'Kesempatan untuk memasuki dan menjadi bagian dari jejaring ilmuwan professional' => $questioner_data->countBy('e_4'),
                'Beasiswa' => $questioner_data->countBy('e_5'),
            ],

            '(f) Bagaimana penilaian Anda terhadap fasilitas kampus di bawah ini?' => [
                'Perpustakaan' => $questioner_data->countBy('f_1'),
                'Teknologi informasi dan komunikasi' => $questioner_data->countBy('f_2'),
                'Pusat Bahasa' => $questioner_data->countBy('f_3'),
                'Fasilitas olahraga' => $questioner_data->countBy('f_4'),
                'Laboratorium/studio/workshop' => $questioner_data->countBy('f_5'),
                'Kondisi dan sistem keamanan serta keselamatan' => $questioner_data->countBy('f_6'),
                'Kondisi serta fasilitas toilet dan sanitari lainnya' => $questioner_data->countBy('f_7'),
                'Kantin, koperasi dan sarana perbelanjaan di dalam kampus' => $questioner_data->countBy('f_8'),
                'Pusat kegiatan mahasiswa beserta fasilitasnya dan ruang rekreasi' => $questioner_data->countBy('f_9'),
                'Fasilitas layanan Kesehatan' => $questioner_data->countBy('f_10'),
            ],

            '(g) Seberapa besar program studi Anda bermanfaat untuk hal-hal di bawah ini?' => [
                'Memulai pekerjaan' => $questioner_data->countBy('g_1'),
                'Pembelajaran yang berkelanjutan dalam pekerjaan' => $questioner_data->countBy('g_2'),
                'Kinerja dalam menjalankan tugas' => $questioner_data->countBy('g_3'),
                'Informasi karir dan peluang kerja' => $questioner_data->countBy('g_4'),
                'Pengembangan diri' => $questioner_data->countBy('g_5'),
                'Meningkatkan keterampilan kewirausahaan' => $questioner_data->countBy('g_6'),
            ]
        ]);
    }

    public function dataStakeholder(Request $request){
        $stakeholder_data = QuestionerStakeHolder::get();

        if($request->query('lulus')){
            $stakeholder_data = $stakeholder_data->filter(function($query) use ($request) {
                $tgl_wisuda = $query->detailPerusahaan->pekerja->user ? $query->detailPerusahaan->pekerja->user->tgl_wisuda : null;
                return $tgl_wisuda ? date('Y', strtotime($tgl_wisuda)) == $request->query('lulus') : false;
            });
        }

        if($request->query('fakultas')){
            $stakeholder_data = $stakeholder_data->filter(function($query) use ($request) {
                return $query->detailPerusahaan->pekerja->user && $query->detailPerusahaan->pekerja->user->fakultas == $request->query('fakultas');
            });
        }

        return response()->json([
            '(e)Menurut anda, seberapa PENTINGkah hal-hal yang tertulis di bawah ini, dimiliki oleh lulusan perguruan tinggi saat mereka bekerja di kantor/perusahaan anda?' => [
                'Ketaqwaan terhadap Tuhan yang maha Esa' => $stakeholder_data->countBy('e_1'),
                'Etika dan kecerdasan dalam bertindak' => $stakeholder_data->countBy('e_2'),
                'Kemampuan bahasa asing (bahasa Inggris, bahasa Arab)' => $stakeholder_data->countBy('e_3'),
                'Ketrampilan internet dan komputer' => $stakeholder_data->countBy('e_4'),
                'Kemampuan belajar' => $stakeholder_data->countBy('e_5'),
                'Kemampuan berkomunikasi' => $stakeholder_data->countBy('e_6'),
                'Bekerja dalam tim/bekerjasama dengan orang lain' => $stakeholder_data->countBy('e_7'),
                'Kemampuan dalam memecahkan masalah' => $stakeholder_data->countBy('e_8'),
                'Inovasi dan/atau kreativitas' => $stakeholder_data->countBy('e_9'),
                'Pengetahuan di bidang atau disiplin ilmu anda' => $stakeholder_data->countBy('e_10'),
                'Pengetahuan di luar bidang atau disiplin ilmu anda' => $stakeholder_data->countBy('e_11'),
                'Keseimbangan antara pikir dan zikir' => $stakeholder_data->countBy('e_12'),
                'Mampu melakukan pendekatan integral-transdisipliner' => $stakeholder_data->countBy('e_13'),
                'Memiliki etos dinamis dan berkarakter pengabdi' => $stakeholder_data->countBy('e_14'),
                'Berakhlak mulia' => $stakeholder_data->countBy('e_15'),
                'Pengetahuan umum dan memiliki wawasan kebangsaan' => $stakeholder_data->countBy('e_16'),
                'Bervisi pengembangan peradaban' => $stakeholder_data->countBy('e_17'),
                'Berpenampilan happy / Bahagia' => $stakeholder_data->countBy('e_18'),
            ],

            '(f) Bagaimanakah tingkat KEPUASAN anda terhadap Alumni FEBI UIN SU Medan yang bekerja di kantor/perusahaan anda, tentang hal-hal di bawah ini?' => [
                'Etika dan kecerdasan dalam bertindak' => $stakeholder_data->countBy('f_1'),
                'Kemampuan bahasa asing (bahasa Inggris, bahasa Arab)' => $stakeholder_data->countBy('f_2'),
                'Ketrampilan internet dan komputer' => $stakeholder_data->countBy('f_3'),
                'Kemampuan belajar' => $stakeholder_data->countBy('f_4'),
                'Kemampuan berkomunikasi' => $stakeholder_data->countBy('f_5'),
                'Bekerja dalam tim/bekerjasama dengan orang lain' => $stakeholder_data->countBy('f_6'),
                'Kemampuan dalam memecahkan masalah' => $stakeholder_data->countBy('f_7'),
                'Inovasi dan/atau kreativitas' => $stakeholder_data->countBy('f_8'),
                'Pengetahuan di bidang atau disiplin ilmu anda' => $stakeholder_data->countBy('f_9'),
                'Pengetahuan di luar bidang atau disiplin ilmu anda' => $stakeholder_data->countBy('f_10'),
                'Keseimbangan antara pikir dan zikir' => $stakeholder_data->countBy('f_11'),
                'Mampu melakukan pendekatan integral-transdisipliner' => $stakeholder_data->countBy('f_12'),
                'Memiliki etos dinamis dan berkarakter pengabdi' => $stakeholder_data->countBy('f_13'),
                'Berakhlak mulia' => $stakeholder_data->countBy('f_14'),
                'Pengetahuan umum dan memiliki wawasan kebangsaan' => $stakeholder_data->countBy('f_15'),
                'Bervisi pengembangan peradaban' => $stakeholder_data->countBy('f_16'),
                'Berpenampilan happy / Bahagia' => $stakeholder_data->countBy('f_17'),
            ]
        ]);
    }

    public function dataPerbandingan(Request $request) {
        $thnWisuda = $request->query('lulus');
        $fakultas = $request->query('fakultas');

        $user_data = User::with(['pendidikan', 'pekerja', 'wirausaha'])
                        ->where('role', 'mahasiswa')
                        ->when($thnWisuda, function ($query) use ($thnWisuda) {
                            return $query->whereYear('tgl_wisuda', $thnWisuda);
                        })
                        ->when($fakultas, function ($query) use ($fakultas) {
                            return $query->where('fakultas', $fakultas);
                        })
                        ->whereHas('certcheck', function ($query) {
                            $query->where('profile_check', true)
                                ->where('perjalanan_karir_check', true)
                                ->where('questioner_check', true);
                        })
                        ->get();
    

        $questioner_stakeholder = QuestionerStakeHolder::with(['detailPerusahaan.pekerja.user'])
                                                        ->when($thnWisuda, function($query) use ($thnWisuda) {
                                                            $query->whereHas('detailPerusahaan.pekerja.user', function($query) use ($thnWisuda) {
                                                                $query->whereYear('tgl_wisuda', $thnWisuda);
                                                            });
                                                        })
                                                        ->when($fakultas, function($query) use ($fakultas) {
                                                            $query->whereHas('detailPerusahaan.pekerja.user', function($query) use ($fakultas) {
                                                                $query->where('fakultas', $fakultas);
                                                            });
                                                        })
                                                        ->whereHas('detailPerusahaan.pekerja.user.certcheck', function($query) {
                                                            $query->where('profile_check', true)
                                                                ->where('perjalanan_karir_check', true)
                                                                ->where('questioner_check', true);
                                                        })
                                                        ->get();

        
        $user_questioner  = Questioner::with(['user.certcheck', 'user.pekerja.detailPerusahaan'])
                                        ->when($thnWisuda, function ($query) use ($thnWisuda) {
                                            $query->whereHas('user', function ($query) use ($thnWisuda) {
                                                $query->whereYear('tgl_wisuda', $thnWisuda);
                                            })->orWhereHas('user.pekerja.detailPerusahaan.user', function ($query) use ($thnWisuda) {
                                                $query->whereYear('tgl_wisuda', $thnWisuda);
                                            });
                                        })
                                        ->when($fakultas, function ($query) use ($fakultas) {
                                            $query->whereHas('user', function ($query) use ($fakultas) {
                                                $query->where('fakultas', $fakultas);
                                            })->orWhereHas('user.pekerja.detailPerusahaan.user', function ($query) use ($fakultas) {
                                                $query->where('fakultas', $fakultas);
                                            });
                                        })
                                        ->whereHas('user.certcheck', function ($query) {
                                            $query->where('profile_check', true)
                                                ->where('perjalanan_karir_check', true)
                                                ->where('questioner_check', true)
                                                ->where('role', 'mahasiswa');
                                        })
                                        ->get();
        

        // Counts users by gender
        $genderCounts = $user_data->countBy('jenis_kelamin');

        $statusCounts = [
            'Pendidikan' => 0,
            'Pekerja' => 0,
            'Wirausaha' => 0,
            'Questioner Alumni' => 0,
            'Questioner Stakeholder' => 0
        ];

        foreach ($user_data as $user) {
            if($user->pendidikan){
                foreach ($user->pendidikan as $pendidikan) {
                    $statusCounts['Pendidikan'] = $pendidikan->getRawOriginal('is_studying') == 1 ? $statusCounts['Pendidikan'] + 1 : $statusCounts['Pendidikan'];
                }
            }

            if($user->pekerja){
                foreach ($user->pekerja as $pekerja) {
                    $statusCounts['Pekerja'] = $pekerja->getRawOriginal('is_active') == 1  ? $statusCounts['Pekerja'] + 1 : $statusCounts['Pekerja'];
                }
            }

            if($user->wirausaha){
                foreach ($user->wirausaha as $wirausaha) {
                    $statusCounts['Wirausaha'] = $wirausaha->getRawOriginal('is_active') == 1 ? $statusCounts['Wirausaha'] + 1 : $statusCounts['Wirausaha'];
                }
            }
        }

        $statusCounts['Questioner Alumni'] = $user_questioner->count();
        $statusCounts['Questioner Stakeholder'] = $questioner_stakeholder->count();

        return response()->json([
            'Total' => [
                'Alumni' => 'Dari mana datanya?',
                'Pengguna' => $user_data->count(),

            ],
            'Jenis kelamin' => $genderCounts,
            'Status' => [
                'Pendidikan' => $statusCounts['Pendidikan'],
                'Pekerja'=> $statusCounts['Pekerja'],
                'Wirausaha' => $statusCounts['Wirausaha'],
                'Questioner Alumni' => $statusCounts['Questioner Alumni'],
                'Questioner Stakeholder' => $statusCounts['Questioner Stakeholder'],
            ]
        ]);
    }

    public function dataIpk(Request $request)
    {
        $tahun = $request->get('lulus');
        $fakultas = $request->get('fakultas');
        $program_studi = $request->get('prodi');
    
        $ipk_counts = [
            '<2.75' => 0,
            '2.75-3.00' => 0,
            '3.00-3.25' => 0,
            '3.25-3.50' => 0,
            '3.50-3.75' => 0,
            '>3.75' => 0
        ];
    
        // Build query with filters
        $query = User::whereNotNull('ipk')
                        ->where('role', 'mahasiswa')
                        ->whereHas('certcheck', function ($query) {
                            $query->where('profile_check', true)
                                ->where('perjalanan_karir_check', true)
                                ->where('questioner_check', true);
                        });
    
        if ($tahun) {
            $query->whereYear('tgl_lulus', $tahun);
        }
    
        if ($program_studi) {
            $query->where('program_studi', $program_studi);
        } elseif ($fakultas) {
            $query->where('fakultas', $fakultas);
        }
    
        // Fetch filtered data
        $ipk_data = $query->select('ipk')->get();
    
        foreach ($ipk_data as $record) {
            $ipk = $record->ipk;
            if ($ipk < 2.75) {
                $ipk_counts['<2.75']++;
            } elseif ($ipk >= 2.75 && $ipk <= 3.00) {
                $ipk_counts['2.75-3.00']++;
            } elseif ($ipk > 3.00 && $ipk <= 3.25) {
                $ipk_counts['3.00-3.25']++;
            } elseif ($ipk > 3.25 && $ipk <= 3.50) {
                $ipk_counts['3.25-3.50']++;
            } elseif ($ipk > 3.50 && $ipk <= 3.75) {
                $ipk_counts['3.50-3.75']++;
            } else {
                $ipk_counts['>3.75']++;
            }
        }
    
        $max_ipk = $ipk_data->max('ipk');
        $min_ipk = $ipk_data->min('ipk');
        $avg_ipk = round($ipk_data->avg('ipk'), 3);
    
        return response()->json([
            'ipk_counts' => $ipk_counts,
            'max_ipk' => $max_ipk,
            'min_ipk' => $min_ipk,
            'avg_ipk' => $avg_ipk
        ]);
    }
    
    public function dataCareer(Request $request)
    {
        $careers = Career::get();
        $all_careers = $careers->count();
        
        $careers = $this->filterByThnWisudahProdiFakultas($careers, $request->query('lulus'), $request->query('fakultas'), $request->query('prodi'));
        
        $career_counts = $careers->count();
        
        $program_studi_counts = $careers->countBy('user.program_studi')->mapWithKeys(function ($value, $key) {
            return [ucwords(strtolower($key === '-' ? 'Admin' : $key)) => $value];
        })->sortDesc();
        
        $fakultas_counts = $careers->countBy('user.fakultas')->mapWithKeys(function ($value, $key) {
            return [$key === '-' ? 'Admin' : $key => $value];
        })->sortDesc();
        
        return response()->json([
            'all_careers' => $all_careers,
            'career_counts' => $career_counts,
            'fakultas_counts' => $fakultas_counts,
            'program_studi_counts' => $program_studi_counts,
        ]);
    }
    

    public function dataLamaStudi(Request $request)
    {
        $masa_studi_semester = User::whereNotNull('masa_studi_semester');

        if ($request->query('lulus')) {
            $masa_studi_semester->whereYear('tgl_lulus', $request->query('lulus'));
        }

        if ($request->query('program_studi')) {
            $masa_studi_semester->where('program_studi', $request->query('program_studi'));
        } elseif ($request->query('fakultas')) {
            $masa_studi_semester->where('fakultas', $request->query('fakultas'));
        }

        $masa_studi_semester = $masa_studi_semester->select('masa_studi_semester')->get();

        $masa_studi_semester = $masa_studi_semester->map(function($item){
            return number_format($item->masa_studi_semester / 2, 1);
        })->countBy();

        return response()->json([
            'masa_studi_semester' => $masa_studi_semester,
        ]);
    }

    public function dataMasaTunggu(Request $request)
    {
        $masa_tunggu_counts = [
            '<6' => 0,
            '6-12' => 0,
            '12-18' => 0,
            '24-30' => 0,
            '36-42' => 0,
            '>42' => 0
        ];

        $masa_tunggu = User::whereNotNull('lama_mendapatkan_pekerjaan')
                        ->where('role', 'mahasiswa')
                        ->whereHas('certcheck', function ($query) {
                            $query->where('profile_check', true)
                                ->where('perjalanan_karir_check', true)
                                ->where('questioner_check', true);
                        });

        if ($request->query('lulus')) {
            $masa_tunggu->whereYear('tgl_lulus', $request->query('lulus'));
        }

        if ($request->query('program_studi')) {
            $masa_tunggu->where('program_studi', $request->query('program_studi'));
        } elseif ($request->query('fakultas')) {
            $masa_tunggu->where('fakultas', $request->query('fakultas'));
        }

        $masa_tunggu = $masa_tunggu->select('lama_mendapatkan_pekerjaan')->get();

        foreach ($masa_tunggu as $item) {
            $months = $item->lama_mendapatkan_pekerjaan / 30; // Convert days to months
            if ($months < 6) {
            $masa_tunggu_counts['<6']++;
            } elseif ($months >= 6 && $months <= 12) {
            $masa_tunggu_counts['6-12']++;
            } elseif ($months > 12 && $months <= 18) {
            $masa_tunggu_counts['12-18']++;
            } elseif ($months > 18 && $months <= 24) {
            $masa_tunggu_counts['24-30']++;
            } elseif ($months > 24 && $months <= 30) {
            $masa_tunggu_counts['30-36']++;
            } elseif ($months > 30 && $months <= 36) {
            $masa_tunggu_counts['36-42']++;
            } else {
            $masa_tunggu_counts['>42']++;
            }
        }

        return response()->json([
            'masa_tunggu_counts' => $masa_tunggu_counts,
        ]);
    }

















    
    /**
     * DRY functions
     */

    // Flatten a multi-dimensional array into a single-dimensional array
    private function flattenArray(array $array, $prefix = '') {
        $result = [];
        foreach ($array as $key => $value) {
            $new_key = $prefix === '' ? $key : $prefix . '_' . $key;
            if (is_array($value)) {
                $result = array_merge($result, $this->flattenArray($value, $new_key));
            } else {
                $result[$new_key] = $value;
            }
        }
        return $result;
    }

    private function moneyRange($value, $category){
        $money_counts = [
            '<1000000' => 0,
            '1000000-3000000' => 0,
            '3000000-5000000' => 0,
            '>5000000' => 0
        ];
    
        foreach ($value as $record) {
            $money = $record->$category;
            if ($money < 1000000) {
                $money_counts['<1000000']++;
            } elseif ($money >= 1000000 && $money <= 3000000) {
                $money_counts['1000000-3000000']++;
            } elseif ($money > 3000000 && $money <= 5000000) {
                $money_counts['3000000-5000000']++;
            } elseif ($money > 5000000) {
                $money_counts['>5000000']++;
            }
        }

        return $money_counts;
    }

    private function dateRange($value, $category){
        $date_counts = [
            '2024' => 0,
            '2023' => 0,
            '2022' => 0,
            '2021' => 0,
            '2020' => 0,
            '<=2019' => 0
        ];
    
        foreach ($value as $record) {
            $date = $record->$category;
            $year = $date ? date('Y', strtotime($date)) : null;
            if ($year <= '2019') {
                $date_counts['<=2019']++;
            } elseif (array_key_exists($year, $date_counts)) {
                $date_counts[$year]++;
            }
        }

        return $date_counts;
    }

    private function filterByThnWisudahProdiFakultas($collection, $ThnWisudah = null, $fakultas = null, $program_studi = null)
    {
        return $collection->filter(function ($item) use ($ThnWisudah, $fakultas, $program_studi) {
            $user = $item->user;
    
            if (!$user) {
                return false;
            }
    
            // Check year of graduation
            if ($ThnWisudah) {
                $tgl_wisuda = $user->tgl_wisuda ?? null;
                if (!$tgl_wisuda || date('Y', strtotime($tgl_wisuda)) != $ThnWisudah) {
                    return false;
                }
            }
    
            // Check faculty
            if ($fakultas && !$program_studi && $user->fakultas != $fakultas) {
                return false;
            }
    
            // Check program of study
            if ($program_studi && $user->program_studi != $program_studi) {
                return false;
            }
    
            return true;
        });
    }
    
}
