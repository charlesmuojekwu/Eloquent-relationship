<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\Post;

class One2ManyController extends Controller
{
    public function many() 
    {
        ##### eager loading [relationships]
        //$users = User::with('addresses')->get();
        $users = User::has('posts')->with('posts')->get(); 
        //$users = User::doesntHave('posts')->with('posts')->get();
             
        return view('one2many',['users' => $users]);

    
    }

    public function postMany() 
    {
        $posts = Post::get();

        return view('one2many',['posts' => $posts]);
    }

    public function create()
    {
        Post::create([
            //'user_id' => '1',
            'title' => 'The main title man'
        ]);

       

        return view('one2many');
    }
}
