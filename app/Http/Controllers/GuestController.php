<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Task;
use App\Models\User;
use App\Models\Guest;
use App\Models\Fiance;
use App\Models\UserWeb;
use App\Models\GuestGroup;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get user information 
        $user = session('user');
        $User = User::findOrFail($user['id']);
        // get layout information 
        $userWeb = UserWeb::userWeb($user['id'])->first();
        $bride = Fiance::findOrFail($userWeb->bride_id);
        $groom = Fiance::findOrFail($userWeb->groom_id);

        $tasks = Task::task($user['id'])->get();
        $completedCount = Task::completedTask($user['id'])->count();

        // main content
        $guests = Guest::guest($user['id'])->get();
        $totalGuest = Guest::guest($user['id'])->count();
        $comingGuest = Guest::guest($user['id'])->coming()->count();
        $notComingGuest = Guest::guest($user['id'])->notComing()->count();
        $notConfirmGuest = Guest::guest($user['id'])->notConfirm()->count();
        $totalWeddingMoney = $comingGuest = Guest::guest($user['id'])->sum('wedding_money');
        $groups = GuestGroup::all();
        $events = Event::where('user_web_id', $userWeb->id)->get();

        return view('guest.guest', [
            'guests' => $guests,
            'groups' => $groups,
            'comingGuest' => $comingGuest,
            'notComingGuest' => $notComingGuest,
            'notConfirmGuest' => $notConfirmGuest,
            'totalWeddingMoney' => $totalWeddingMoney,
            'events' => $events,
            //layout
            'bride' => $bride,
            'groom' => $groom,
            'totalGuest' => $totalGuest,
            'currentBudget' => $User->current_budget,
            'taskCount' => $tasks->count(),
            'completedCount' => $completedCount
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
        // $data = $request->validate([
        //     'event' => ['required'],
        //     'name' => ['required', 'min:1'],
        //     'phone_number' => ['required','numeric'],
        //     'group_id' => ['required','numeric'],
        //     'go_with'=>['required','numeric'],
        //     'wedding_money'=>['numeric']
        // ]);
        $guest = new Guest;
        $guest->ticket = '-';
        $guest->invitation_id = '-';
        $guest->confirmation = '-';
        $guest->event = $request->input('event');
        $guest->name = $request->input('name');
        $guest->phone_number = $request->input('phone_number');
        $guest->group_id = $request->input('group_id');
        $guest->go_with = $request->input('go_with');
        $guest->wedding_money = $request->input('wedding_money');
        $guest->user_id = $user['id'];
        $guest->save();

        return redirect()->route('guest.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        // get user information 
        $user = session('user');
        // get groom bride information 
        $userWeb = UserWeb::where('user_id', $user['id'])->first();
        $bride = Fiance::findOrFail($userWeb->bride_id);
        $groom = Fiance::findOrFail($userWeb->groom_id);
        $event = Event::where('name',$guest->event)->first();
        return view('wedding-invitation.index', [
            'guest' => $guest,
            'bride' => $bride,
            'groom' => $groom,
            'event' => $event,
            'user' => $user['id']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guest $guest)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = session('user');
        $guest = Guest::findOrFail($id);
        $guest->event = $request->input('event');
        $guest->name = $request->input('name');
        $guest->phone_number = $request->input('phone_number');
        $guest->group_id = $request->input('group_id');
        $guest->go_with = $request->input('go_with');
        $guest->wedding_money = $request->input('wedding_money');
        $guest->user_id = $user['id'];
        $guest->save();

        return redirect()->route('guest.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        //
    }
}
