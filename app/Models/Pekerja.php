<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pekerja extends Model
{
  use HasFactory;

  protected $guarded = [
    "id"
  ];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function detailPerusahaan() {
    return $this->hasOne(DetailPerusahaan::class);
  }
}
