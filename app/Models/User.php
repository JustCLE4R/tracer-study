<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  // protected $fillable = [
  //     'name',
  //     'email',
  //     'password',
  // ];

  protected $guarded = ['id'];

  protected $primarykey = 'nim';

  protected $with = [
    // 'pekerja',
    // 'wirausaha',
    // 'pendidikan',
    // 'career',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];

  public function career(){
    return $this->hasMany(Career::class);
  }

  public function pekerja(){
    return $this->hasMany(Pekerja::class);
  }

  public function wirausaha(){
    return $this->hasMany(Wirausaha::class);
  }

  public function pendidikan(){
    return $this->hasMany(Pendidikan::class);
  }

  public function questioner(){
    return $this->hasOne(Questioner::class);
  }
}
