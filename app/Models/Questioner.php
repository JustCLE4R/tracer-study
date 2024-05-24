<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Questioner extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Just bunch of accessor
     */
    protected function getC1Attribute($value){
        $c1 = [
            0 => 'Perkuliahan Himpunan Prodi',
            1 => 'Organisasi Ekstra Kampus',
            2 => 'Organisasi Intra Kampus',
            3 => 'Project / Riset',
        ];

        return $c1[$value] ?? $value;
    }

    protected function maps($key) {
        $map = [
            0 => 'Sangat Baik',
            1 => 'Baik',
            2 => 'Cukup',
            3 => 'Kurang Baik',
            4 => 'Tidak Baik',
        ];
    
        return $map[$key] ?? $key;
    }
    
    public function getAttribute($key) {
        $prefixes = ['a_', 'b_', 'd_', 'e_', 'f_', 'g_'];
        foreach ($prefixes as $prefix) {
            if (strpos($key, $prefix) === 0) {
                $value = $this->attributes[$key];
                return $this->maps($value);
            }
        }
    
        return parent::getAttribute($key);
    }
    
    

}
