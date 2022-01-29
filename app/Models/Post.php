<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

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
        return $this->belongsToMany(Tag::class);
        //return $this->belongsToMany(Tag::class,'post_tag');  ## pivot table should be named in alphabetical order of the 2 tables
    }
}
