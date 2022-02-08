<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        //return $this->hasMany(User::class);
        return $this->belongsToMany(User::class);  // using pivot
    }
    

    public function tasks()
    {
        //return $this->hasManyThrough(Task::class, User::class);
        //return $this->hasManyThrough(Task::class, User::class, 'project_id', 'user_id'); // for non naming convention query

        ## for many to many with pivot
        return $this->hasManyThrough(
            Task::class, 
            Team::class, 
            'project_id',   // forieng key in users table || now in pivot
             'user_id',    // foreign key in tasks table
             'id',    // localkey in projects table
             'user_id' // in the pivot table
            );
    }

    public function task()
    {
        return $this->hasOneThrough(Task::class, User::class);
    }
}
