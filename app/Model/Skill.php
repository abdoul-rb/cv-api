<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function (Skill $skill) {
            $skill->slug = Str::slug($skill->name);
        });

        static::updating(function (Skill $skill) {
            $skill->slug = Str::slug($skill->name);
        });
    }

    public function achieves() {
       return $this->belongsToMany(Achieve::class);
    }

}
