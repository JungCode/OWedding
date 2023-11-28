<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Fiance;
use App\Models\User;
use App\Models\UserWeb;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // get user information 
        $user = session('user');
        $User = User::findOrFail($user['id']);
        // get groom bride information 
        $userWeb = UserWeb::where('user_id', $user['id'])->first();
        $bride = Fiance::findOrFail($userWeb->bride_id);
        $groom = Fiance::findOrFail($userWeb->groom_id);
        
        // main content
        $tasks = Task::task($user['id'])->get();
        $completedCount = Task::completedTask($user['id'])->count();


        return view('task.index', [
            'currentBudget' => $User->current_budget,
            'tasks' => $tasks,
            'taskCount' => $tasks->count(),
            'completedCount' => $completedCount,

            'bride' => $bride,
            'groom' => $groom
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        //adding task
        $user = session('user');
        $data = $request->validated();
        $data['user_id'] = $user['id'];
        $user->tasks()->create($data);
        $task = Task::latest()->first();
        //tick the completed
        $completed = $request->input('completed');
        if($completed == "on"){
            $this->toggleComplete($task);
        }
        
        return redirect()->route('tasks.index')
        ->with('success','Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('show', [
            "task" => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('edit', [
            "task" => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        $completed = $request->input('completed');
        if($completed == "on"){
            $this->toggleComplete($task);
        }
        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }

    //Toggle complete
    public function toggleComplete(Task $task)
    {
        $task->toggleComplete();
        return redirect()->back()->with('success', 'Task updated successfully!');
    }
    public function toggleCompleteTasks(Request $request){
        $input = $request->input('IdItems');
        $input = substr($input, 0, -1);
        $idItems = explode('.',$input);
        foreach($idItems as $idItem){
            $this->toggleComplete(Task::find($idItem));
        }
        return redirect()->route('tasks.index')
        ->with('success','Task created successfully');
    }
}
