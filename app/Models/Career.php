<?php

namespace App\Models;

use Attribute;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [
        "id"
    ];

    // protected $with = [
    //   "user"
    // ];

    protected function getCategoryAttribute($value)
    {
        switch ($value) {
            case 1:
                return 'Instansi Pemerintahan';
            case 2:
                return 'Lembaga Swadaya Masyarakat';
            case 3:
                return 'Perusahaan Swasta';
            case 4:
                return 'Freelancer';
            default:
                return 'Unknown Category';
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['company_name', 'position']
            ]
        ];
    }
}
