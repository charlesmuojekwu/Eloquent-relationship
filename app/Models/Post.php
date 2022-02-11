<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'title','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest User'
        ]);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)
            ->using(PostTag::class)
            ->withTimestamps()
            ->withPivot('status');
        //return $this->belongsToMany(Tag::class,'post_tag');  ## pivot table should be named in alphabetical order of the 2 tables
    }

    //to many
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // to noe
    public function comment()
    {
        return $this->morphOne(Comment::class, 'commentable')
            ->latest();
    }

    // taggable
    public function taggable()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
