<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Fiance;
use App\Models\User;
use App\Models\UserWeb;
use Illuminate\Http\Request;

class EventController extends Controller
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
        // main content 
        $events = Event::where('user_web_id', $userWeb->id)->get();
        return view('weddingEvent.event', [
            'events' => $events,
            'userWebId' => $userWeb->id,
            
            'bride' => $bride,
            'groom' => $groom,
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
        $event = new Event;
        $event->name = $request->input('name');
        $event->user_web_id = $request->input('user_web_id');
        $event->time = $request->input('time');
        $event->date = $request->input('date');
        $event->address = $request->input('address');
        $event->photo = "";
        $event->link = $request->input('link');
        $event->save();

        $event->photo = $this->storeImage($request, $event->id);
        $event->save();
        return redirect()->route('events.index');
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
        $event = Event::findOrFail($id);
        $event->name = $request->input('name');
        $event->user_web_id = $request->input('user_web_id');
        $event->time = $request->input('time');
        $event->date = $request->input('date');
        $event->address = $request->input('address');
        if ($request->file('photo')) {
            $event->photo = $this->storeImage($request, $event->id);
        }
        $event->link = $request->input('link');
        $event->save();
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index');
    }
    protected function storeImage(Request $request, string $id)
    {
        $extension = $request->file('photo')->getClientOriginalExtension();
        $newFileName = "event" . $id . "." . $extension;
        $path = $request->file('photo')->storeAs('public/event-image', $newFileName);
        return substr($path, strlen('public/'));
    }
}
