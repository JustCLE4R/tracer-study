<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPerusahaan extends Model
{
    use HasFactory;

    protected $guarded = [
        "id",
    ];

    public function pekerja(){
        return $this->belongsTo(Pekerja::class);
    }
}
