<?php

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
Route::fallback(function(){
  return 'sai trang roi nhoc';
});

Route::get('/', function() {
  return redirect()->route('landing');
});

Route::view('/login','signin')
->name('login');

Route::get('/register', function () {
  return view('signup');
})->name('users.create');

Route::view('/owedding','landing')
->name('landing');

//USERS

Route::post('/users', function (Request $request){
  $data = $request->validate([
    'name' => ['required', 'min:3','max:10', Rule::unique('users','name')],
    'email' => ['required','email',Rule::unique('users', 'email')],
    'password' => ['required', 'min:8','max:200'],
    'retype_password' => ['required' ,'same:password']
  ]);
  $user = new User;
  $user->name = $data['name'];
  $user->email = $data['email'];
  $user->email_verified_at = now();
  $user->password = bcrypt($data['password']);
  $user->remember_token = Str::random(10);
  $user->save();

  auth()->login($user);

  return redirect()->route('landing');
})->name('users.store');

Route::post('/logout', function(){
  auth()->logout();
  return redirect()->route('landing');
})->name('logout');

Route::post('/login',function(Request $request){
  $data = $request->validate([
    'loginemail' => 'required',
    'loginpassword' => 'required'
  ]);
  if(auth()->attempt(['email' => $data['loginemail'],
                      'password' => $data['loginpassword']])){
    $request->session()->regenerate();
    return redirect()->route('landing');
  }else{
    return redirect()->back()->with('LoginFailed','Failed to login');
  };
})->name('users.login');

//TASKS

// Route::get('/tasks', function ()  {
//     return view('index', [
//         'tasks' => Task::latest()->paginate(10)
//     ]);
// })->name('tasks.index');

// Route::view('/tasks/create','create')
//   ->name('tasks.create');

// Route::get('/tasks/{task}/edit', function(Task $task) {
//   return view('edit', [
//     "task"=>$task
//   ]);
// })->name('tasks.edit');

// Route::get('/tasks/{task}', function(Task $task) {
//     return view('show', [
//       "task"=>$task
//     ]);
// })->name('tasks.show');

// Route::post('/tasks', function (TaskRequest $request){
//   $task= Task::create($request->validated());

//   return redirect()->route('tasks.show', ['task'=> $task->id])
//     ->with('success','Task created successfully');
// })->name('tasks.store');

// Route::put('/tasks/{task}', function (Task $task, TaskRequest $request){
//      $task->update($request->validated());

//   return redirect()->route('tasks.show', ['task'=> $task->id])
//     ->with('success','Task updated successfully');
// })->name('tasks.update');

// Route::delete('/task/{task}', function(Task $task) {
//   $task->delete();

//   return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
// })->name('tasks.destroy');

// Route::put('tasks/{task}/toggle-complete', function (Task $task) {
//   $task->toggleComplete();

//   return redirect()->back()->with('success', 'Task updated successfully!');
// })->name('tasks.toggle-complete');

// Route::get('/khon', function () {
//     return "khon";
// })->name('ngu');
// Route::get('/chao/{ten}', function ($ten) {
//     return 'Chao ' . $ten . '!';
// });
