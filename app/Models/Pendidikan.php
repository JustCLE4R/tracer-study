<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
  use HasFactory;

  protected $guarded = [
    "id"
  ];

  // protected $with = [
  //   "user"
  // ];

  /**
   * Just bunch of accessor
   */

    protected function getIsStudyingAttribute($value){
      $isStudying = [
        0 => "Belum Selesai",
        1 => "Sudah Selesai"
      ];

      return $isStudying[$value] ?? "Unknown Status";
    }

    protected function getTingkatPendidikanAttribute($value){
      $tingkatPendidikan = [
        "a" => "S1",
        "b" => "S2",
        "c" => "S3"
      ];

      return $tingkatPendidikan[$value] ?? "Unknown Tingkat Pendidikan";
    }

    protected function getIsLinearAttribute($value){
      $isLinear = [
        0 => "Tidak",
        1 => "Ya"
      ];

      return $isLinear[$value] ?? "Unknown Linear";
    }
  
  /**
   * end of accessor
   */

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
