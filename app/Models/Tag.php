<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['post_id','name'];

    /// many to many
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function postTags()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function videoTags()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
