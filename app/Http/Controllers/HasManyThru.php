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
        $project = Project::create([
            'title' => 'ProjectA'
        ]);

        $user1 = User::create([
            'name' => 'User 1',
            'email' => 'user1@mail.com',
            'password' => Hash::make('password'),
            'project_id' => $project->id
        ]);

        $user2 = User::create([
            'name' => 'User 2',
            'email' => 'user2@mail.com',
            'password' => Hash::make('password'),
            'project_id' => $project->id
        ]);


        $task1 = Task::create([
            'title' => 'task 1 for project 1 by user 1',
            'user_id' => $user1->id
        ]);

        $task2 = Task::create([
            'title' => 'task 2 for project 1 by user 1',
            'user_id' => $user1->id
        ]);

        $task3 = Task::create([
            'title' => 'task 3 for project 1 by user 1',
            'user_id' => $user2->id
        ]);
    }
}
