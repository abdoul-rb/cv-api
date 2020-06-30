<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Achieve extends Model
{
    protected $fillable = [
      'name',
      'slug',
      'url',
      'description',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function (Achieve $achieve) {
            $achieve->slug = Str::slug($achieve->name);
        });

        static::updating(function (Achieve $achieve) {
            $achieve->slug = Str::slug($achieve->name);
        });
    }

    public function skills()
    {
       return $this->belongsToMany(Skill::class);
    }
}
