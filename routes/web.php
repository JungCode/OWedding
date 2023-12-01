<?php

use App\Http\Controllers\BudgetCategoryController;
use App\Http\Controllers\BudgetItemController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FianceController;
use App\Http\Controllers\LoveStoryController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserWebController;
use App\Models\Fiance;
use App\Models\LoveStory;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Login;
use App\Http\Requests\TaskRequest;
use App\Models\BudgetCategory;
use App\Models\BudgetItem;
use App\Models\UserWeb;
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
  return redirect()->route('users.index');
});
Route::view('tool/guest','guest.guest')->name('guest');




//USER
Route::post('/owedding/login',[UserController::class,'login'])->name('users.login');
Route::get('/owedding/login',[UserController::class,'showlogin'])->name('users.showlogin');

Route::post('/owedding/logout',[UserController::class,'logout'])->name('users.logout');
Route::get('/owedding/register',[UserController::class,'showRegister'])->name('users.showRegister');

Route::get('/owedding/profile-user',[UserController::class,'showProfile'])->name('users.showProfile');
Route::get('/owedding/management',[UserController::class,'managementWeb'])->name('users.managementWeb');

Route::post('/owedding/update-current-budget',[UserController::class,'updateCurrentBudget'])->name('users.updateCurrentBudget');
Route::resource('/owedding/users',UserController::class)->only([
  'index', 'store', 'update'
]);




//BUDGET MANAGEMENT
Route::resource('tool/budgetCategories', BudgetCategoryController::class)->only([
  'index','store', 'update', 'destroy'
]);
Route::resource('tool/budgetItems', BudgetItemController::class)->only([
  'store', 'update', 'destroy'
]);



//TASK
Route::resource('tool/tasks', TaskController::class)->only([
  'index', 'store', 'update', 'destroy'
]);
Route::post('tool/tasks/tasks-toggle-complete',[TaskController::class,'toggleCompleteTasks'])->name('tasks.toggleCompleteTasks');
Route::put('tool/tasks/{task}/toggle-complete',[TaskController::class,'toggleComplete'])->name('tasks.toggleComplete');


//TEMPLATE
Route::resource('owedding/templates',TemplateController::class)->only([
  'index', 'show', 'create', 'store'
]);
Route::get('/owedding/templates/create/{id}',[TemplateController::class,'confirm'])->name('templates.confirm');


//USERWEB
Route::resource('owedding/userwebs',UserWebController::class)->only([
  'store', 'index'
]);
Route::get('owedding/userwebs/{id}',[UserWebController::class,'index'])->name('userwebs.index');



//FIANCE
Route::resource('tool/fiances',FianceController::class)->only([
  'index','update'
]);



//SLIDE
Route::resource('tool/slides',SlideController::class)->only([
  'index', 'update'
]);



//EVENT
Route::resource('tool/events',EventController::class)->only([
  'index', 'store', 'update', 'destroy'
]);




//LOVE STORY
Route::resource('tool/loveStories',LoveStoryController::class)->only([
  'index', 'store', 'update', 'destroy'
]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
