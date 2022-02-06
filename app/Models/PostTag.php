<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PostTag extends Pivot
{
    use HasFactory;

    protected $table = 'post_tag';

    public static function boot()
    {
        parent::boot();

        /// ADDED BY ME event handling when a tag is added or deleted
        static::created(function ($item) {
            dd($item);
        });

        static::deleted(function ($item) {
            dd($item);
        });
    }
}
