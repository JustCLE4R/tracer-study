<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wirausaha extends Model
{
  use HasFactory;

  protected $guarded = [
    'id'
  ];

  protected function getJabatanUsahaAttribute($value){
    $jabatanUsaha = [
      "a" => "Pemilik",
      "b" => "Direktur",
      "c" => "Kepala Unit",
      "d" => "Supervisor",
      "e" => "Staf",
      "f" => "Self Employed"
    ];

    return $jabatanUsaha[$value] ?? 'Unknown Jabatan';
  }

  public function user() {
    return $this->belongsTo(User::class);
  }
}
