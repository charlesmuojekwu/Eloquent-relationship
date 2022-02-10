<?php

use App\Http\Controllers\HasManyThru;
use App\Http\Controllers\Many2ManyController;
use App\Http\Controllers\One2ManyController;
use App\Http\Controllers\One2OneController;
use App\Http\Controllers\Polymorphic;
use Illuminate\Support\Facades\Route;
use App\Models\Address;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

## one 2 one 
Route::get('/home', [One2OneController::class, 'main']);
Route::get('/home2', [One2OneController::class, 'belong']);
Route::get('/onecreate', [One2OneController::class, 'create']);


## One to Many
Route::get('/first', [One2ManyController::class, 'many']);
Route::get('/first1', [One2ManyController::class, 'postMany']);
Route::get('/manycreate', [One2ManyController::class, 'create']);


## many to Many
Route::get('/all', [Many2ManyController::class, 'many']);
Route::get('/get', [Many2ManyController::class, 'postMany']);
Route::get('/many', [Many2ManyController::class, 'create']);


## has-one-through &has-many
Route::get('projects', [HasManyThru::class, 'index']);
Route::get('index-many', [HasManyThru::class, 'indexMany']);
Route::get('project-create', [HasManyThru::class, 'create']);
Route::get('project-many', [HasManyThru::class, 'm2mPivot']);


## Polymorphic relation
Route::get('morph-create', [Polymorphic::class, 'create']);
Route::get('morph-show', [Polymorphic::class, 'show']);


Route::get('/view', function() {

});

