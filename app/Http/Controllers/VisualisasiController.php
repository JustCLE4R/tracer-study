<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
use App\Models\Wirausaha;
use App\Models\Pendidikan;
use App\Models\Questioner;

class VisualisasiController extends Controller
{
    public function dataWirausaha(){

        $wirausaha_data = Wirausaha::get(['is_active', 'tingkat_tempat_usaha', 'bidang_usaha', 'omset', 'pendapatan', 'pemodal', 'kesesuaian', 'tgl_mulai_usaha', 'tgl_akhir_usaha']);

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

        return [
            'is_active' => $is_active_counts,
            'Tingkat / Ukuran Tempat Usaha' => $tingkat_tempat_usaha_counts,
            'Pemodal Usaha' => $pemodal_counts,
            'Bidang Usaha' => $bidang_usaha_counts,
            'Omset' => $omset_counts,
            'Pendapatan' => $pendapatan_counts,
            'Tanggal Mulai Usaha' => $tgl_mulai_usaha_counts,
            'Tanggal Akhir Usaha' => $tgl_akhir_usaha_counts,
            'Kesesuaian Usaha dengan Prodi' => $kesesuaian_counts,
        ];
    }

    public function dataPekerja(){
        $pekerja_data = Pekerja::get(['is_active', 'status_pekerjaan', 'kriteria_pekerjaan', 'bidang_pekerjaan', 'tingkat_tempat_bekerja', 'jabatan_pekerjaan', 'pendapatan', 'kesesuaian', 'tgl_mulai_kerja', 'tgl_akhir_kerja']);

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

    public function dataPendidikan(){
        $pendidikan_data = Pendidikan::get(['is_studying', 'tingkat_pendidikan', 'tgl_surat_penerimaan_pendidikan', 'tgl_mulai_pendidikan', 'is_linear']);

        return [
            'is_studying' => $pendidikan_data->countBy('is_studying'),
            'Tingkat Pendidikan' => $pendidikan_data->countBy('tingkat_pendidikan'),
            'Tgl Surat Penerimaan Pendidikan' => $this->dateRange($pendidikan_data, 'tgl_surat_penerimaan_pendidikan'),
            'Tgl Mulai Pendidikan' => $this->dateRange($pendidikan_data, 'tgl_mulai_pendidikan'),
            'Satu Linear' => $pendidikan_data->countBy('is_linear'),
        ];
    }

    public function dataQuestioner(){
        $questioner_data = Questioner::get();

        return[
            'Ketaqwaan terhadap Tuhan yang maha Esa' => $questioner_data->countBy('a_1'),
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

            'ini c' => $questioner_data->countBy('c_1'),





        ];
    }

    /**
     * DRY functions
     */

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
            '2019' => 0
        ];
    
        foreach ($value as $record) {
            $date = $record->$category;
            $year = date('Y', strtotime($date));
            if (array_key_exists($year, $date_counts)) {
                $date_counts[$year]++;
            }
        }

        return $date_counts;
    }
}
