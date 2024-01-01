<?php

namespace App\Http\Controllers;

use App\Models\Fiance;
use App\Models\Guest;
use App\Models\Slide;
use App\Models\Task;
use App\Models\User;
use App\Models\UserWeb;
use Illuminate\Http\Request;

class SlideController extends Controller
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
        $totalGuest = Guest::guest($user['id'])->count();
        $tasks = Task::task($user['id'])->get();
        $completedCount = Task::completedTask($user['id'])->count();
        //main function
        $userWeb = UserWeb::where('user_id', $User->id)->first();
        $slides = Slide::where('user_web_id', $userWeb->id)->get();

        return view('slide.slide', [
            'currentBudget' => $User->current_budget,
            'taskCount' => $tasks->count(),
            'completedCount' => $completedCount,

            'bride' => $bride,
            'groom' => $groom,
            'totalGuest' => $totalGuest,

            'slides' => $slides
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
        //
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
        $user = session('user');
        $userWeb = UserWeb::where('user_id', $user['id'])->first();
        $slides = Slide::where('user_web_id', $userWeb->id)->get();
        $i = 0;
        foreach ($slides as $slide) {
            $i++;
            if ($request->file('slide' . $i)) {
                $slide->photo = $this->storeImage($request, 'slide' . $i);
            }
            $slide->save();
        }
        return redirect()->route('slides.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    protected function storeImage(Request $request, string $fileName)
    {
        $extension = $request->file($fileName)->getClientOriginalExtension();
        $newFileName = $fileName . $extension;
        $path = $request->file($fileName)->storeAs('public/slide-image', $newFileName);
        return substr($path, strlen('public/'));
    }
}
