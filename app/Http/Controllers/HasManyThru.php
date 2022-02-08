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
        return $project->task;    //retuns task model
    }


    public function indexMany()
    {
        ### project many to many
        // $project = Project::find(1);
        // return $project->users;

        ### user many to many
        // $user = User::find(2);
        // return $user->projects;


        $project = Project::find(1);
        return $project->tasks;



        // Task::create([
        //     'title' => 'Task A',
        //     'user_id' => 1
        // ]);

        // Task::create([
        //     'title' => 'Task B',
        //     'user_id' => 1
        // ]);

        // Task::create([
        //     'title' => 'Task C',
        //     'user_id' => 2
        // ]);

        // Task::create([
        //     'title' => 'Task D',
        //     'user_id' => 3
        // ]);


      
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



    /// create many to many using pivot table

    public function m2mPivot()
    {
        $project1 = Project::create([
            'title' => 'Project A'
        ]);

        $project2 = Project::create([
            'title' => 'Project B'
        ]);

        $user1 = User::create([
            'name' => 'User A',
            'email' => 'userA@mail.com',
            'password' => Hash::make('password'),
        ]);

        $user2 = User::create([
            'name' => 'User B',
            'email' => 'userB@mail.com',
            'password' => Hash::make('password'),
        ]);

        $user3 = User::create([
            'name' => 'User C',
            'email' => 'userC@mail.com',
            'password' => Hash::make('password'),
        ]);

        $project1->users()->attach($user1);
        $project1->users()->attach($user2);
        $project1->users()->attach($user3);

        $project2->users()->attach($user1);
        $project2->users()->attach($user3);

        

    }
}
