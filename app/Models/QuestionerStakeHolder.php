<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionerStakeHolder extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function detailPerusahaan(){
        return $this->belongsTo(DetailPerusahaan::class);
    }

    /**
     * Just bunch of accessor
     */
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
        $prefixes = ['e_', 'f_'];
        foreach ($prefixes as $prefix) {
            if (strpos($key, $prefix) === 0) {
                $value = $this->attributes[$key];
                return $this->maps($value);
            }
        }
    
        return parent::getAttribute($key);
    }
}
