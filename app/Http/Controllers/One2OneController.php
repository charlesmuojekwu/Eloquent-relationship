<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;

class One2OneController extends Controller
{
    public function main()
    {
        $users = User::all();

        return view('one2one',['users' => $users]);
    }


    public function belong()
    {
        #### For eager loading reduces query to database in relationship[user->table]
        $addresses = Address::with('user')->get();

        ###### normal query without relationship 
        //$addresses = Address::all();

        return view('one2one',['addresses' => $addresses]);
    }


    public function create()
    {      

        // Create logic for one to one relationship

        $address = new Address();
        $address->country = 'usa';
        

        $user = new User();
        $user->email = 'ahmesd@mail.comm';
        $user->name = 'ahmed';
        $user->password = '123456';
        $user->save();
        $user->address()->save($address);


        return view('one2one');

    }
}
