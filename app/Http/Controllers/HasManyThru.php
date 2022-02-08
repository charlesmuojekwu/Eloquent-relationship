<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HasManyThru extends Controller
{

    public function index()
    {
        $project = Project::find(1);

        //return $project->users[1]->tasks;
        return $project->tasks;   // returns task collection
        return $project->task; //retuns task model
    }



    public function create()
    {
        $project = Project::create([
            'title' => 'ProjectB'
        ]);

        $user3  = User::create([
            'name' => 'User 3',
            'email' => 'user3@mail.com',
            'password' => Hash::make('password'),
            'project_id' => $project->id
        ]);

        $user4 = User::create([
            'name' => 'User 4',
            'email' => 'user4@mail.com',
            'password' => Hash::make('password'),
            'project_id' => $project->id
        ]);

        $user5 = User::create([
            'name' => 'User 5',
            'email' => 'user5@mail.com',
            'password' => Hash::make('password'),
            'project_id' => $project->id
        ]);


        $task1 = Task::create([
            'title' => 'task 4 for project 2 by user 3',
            'user_id' => $user3->id
        ]);

        $task2 = Task::create([
            'title' => 'task 5 for project 2 by user 4',
            'user_id' => $user4->id
        ]);

        $task3 = Task::create([
            'title' => 'task 6 for project 2 by user 5',
            'user_id' => $user5->id
        ]);
    }
}
