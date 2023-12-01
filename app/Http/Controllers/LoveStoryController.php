<?php

namespace App\Http\Controllers;

use App\Models\Fiance;
use App\Models\LoveStory;
use App\Models\Task;
use App\Models\User;
use App\Models\UserWeb;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class LoveStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get user information 
        $user = session('user');
        $User = User::findOrFail($user['id']);
        // get groom bride information 
        $userWeb = UserWeb::where('user_id', $user['id'])->first();
        $bride = Fiance::findOrFail($userWeb->bride_id);
        $groom = Fiance::findOrFail($userWeb->groom_id);
        //for layout
        $tasks = Task::task($user['id'])->get();
        $completedCount = Task::completedTask($user['id'])->count();

        //main function
        $loveStories = LoveStory::where('user_web_id', $userWeb->id)->get();
        return view('lovestory.lovestory', [
            'currentBudget' => $User->current_budget,
            'taskCount' => $tasks->count(),
            'completedCount' => $completedCount,

            'bride' => $bride,
            'groom' => $groom,
            
            'loveStories' => $loveStories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = session('user');
        $userWeb = UserWeb::where('user_id', $user['id'])->first();
        $items = $request->all();
        $photos = $request->file('photo');
        $index = 0;
        foreach ($items['id'] as $id) {
            if ($id) {
                $loveStory = LoveStory::findOrFail($id);
                $loveStory->title = $items['title'][$index];
                $loveStory->date = $items['date'][$index];
                $loveStory->content = $items['content'][$index];
                if ($items['photoCheck'][$index]) {
                    $loveStory->photo = $this->storeImage($photos[$index], 'story' . $loveStory->id);
                }
                $loveStory->save();
            } else {
                $loveStory = new LoveStory;
                $loveStory->title = $items['title'][$index];
                $loveStory->date = $items['date'][$index];
                $loveStory->content = $items['content'][$index];
                $loveStory->user_web_id = $userWeb->id;
                $loveStory->save();
                if ($items['photoCheck'][$index]) {
                    $loveStory->photo = $this->storeImage($photos[$index], 'story' . $loveStory->id);
                } else {
                    $loveStory->photo = "1";
                }
            }
            $index++;
        }
        return redirect()->route('loveStories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    protected function storeImage($photo, string $fileName)
    {
        $extension = $photo->getClientOriginalExtension();
        $newFileName = $fileName . $extension;
        $path = $photo->storeAs('public/lovestory-image', $newFileName);
        return substr($path, strlen('public/'));
    }
}
