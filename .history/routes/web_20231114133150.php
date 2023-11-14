<?php

use App\Http\Controllers\BudgetCategoryController;
use App\Http\Controllers\UserController;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Login;
use App\Http\Requests\TaskRequest;
use App\Models\BudgetCategory;
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
  return 'sai trang roi nhoc';
});
Route::get('/', function() {
  return redirect()->route('landing');
});
Route::view('/owedding','user.landing')
->name('landing');

Route::view('/budget', 'weddingBudget.budget')->name('budget');
//USER
Route::post('/login',[UserController::class,'login'])->name('users.login');
Route::get('/login',[UserController::class,'showlogin'])->name('users.showlogin');
Route::post('/logout',[UserController::class,'logout'])->name('users.logout');
Route::get('/register',[UserController::class,'showRegister'])->name('users.showRegister');
Route::resource('users',UserController::class)->only([
  'store'
]);
//BUDGET MANAGEMENT
Route::resource('budgetCategories', BudgetCategoryController::class);

//TASK