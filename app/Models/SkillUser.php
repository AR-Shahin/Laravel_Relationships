<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SkillUser extends Pivot
{
    use HasFactory;
    protected $table = 'skill_user';

    public static function boot()
    {
        parent::boot();
        static::created(function () {
            info('I am created attach');
        });

        static::deleted(function () {
            info('I am delete attach');
        });
    }
}
