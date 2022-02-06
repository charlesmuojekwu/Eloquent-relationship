<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class Many2ManyController extends Controller
{
    /// Cases
    ## Posts may have many tags
    ## Tags may have many posts

    /// Implemented
    ## usign [pivot] table

    public function many()
    {
        #### The inserts into the pivot table [post_tag] post&tag ID
         //$tag = Tag::first();
         $post = Post::first();

         //dd($post->tags->first()->pivot->status);

         $post->tags()->attach([
             1 => [
                 'status' => 'approved'
             ]
         ]);
         //$post->tags()->attach($tag);
         //$post->tags()->attach([2,4,1,3]);
         //$post->tags()->detach([4]);


        $posts = Post::with('user', 'tags')->get();
        return view('many2many',['posts' => $posts]);

        // $tags = Tag::with('posts')->get();
        // return view('many2many',['tags' => $tags]);
    }

    public function create() 
    {

        Tag::create([
            'name' => 'laravel'
        ]);


    }
}
