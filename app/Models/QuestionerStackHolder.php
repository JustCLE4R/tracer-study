<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionerStackHolder extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function detailPerusahaan(){
        return $this->belongsTo(DetailPerusahaan::class);
    }
}
