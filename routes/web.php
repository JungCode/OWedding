<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Login;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\DescriptionList\Node\Description;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//INDEX
Route::fallback(function(){
  return view('404') ;
});
Route::get('/', function() {
  return redirect()->route('landing');
});
Route::view('/owedding','user.landing')
->name('landing');


//USER
Route::post('/login',[UserController::class,'login'])->name('users.login');
Route::get('/login',[UserController::class,'showlogin'])->name('users.showlogin');
Route::post('/logout',[UserController::class,'logout'])->name('users.logout');
Route::get('/register',[UserController::class,'showRegister'])->name('users.showRegister');
Route::resource('users',UserController::class)->only([
  'store'
]);

//TASK
Route::resource('tasks', TaskController::class);
Route::put('tasks/{task}/toggle-complete',[TaskController::class,'toggleComplete'])->name('tasks.toggleComplete');

