<?php

namespace App\Http\Controllers;

use App\Models\Fiance;
use App\Models\User;
use App\Models\UserWeb;
use Illuminate\Http\Request;
use Nette\Utils\Finder;

class UserWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $userWeb = UserWeb::where('user_id', $id)->first();
        if (!$userWeb) return redirect()->route('templates.index');
        $bride = Fiance::findOrFail($userWeb->bride_id);
        $groom = Fiance::findOrFail($userWeb->groom_id);
        return view('template-choice.template.template' . $userWeb->template_id, [
            'bride_name' => $bride->full_name,
            'groom_name' => $groom->full_name,
            'bride_description' => $bride->description,
            'groom_description' => $groom->description,
            'wedding_date' => $userWeb->wedding_date,
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
        $data  = $request->validate([
            'template_id' => ['required'],
            'bride_name' => ['required'],
            'groom_name' => ['required'],
            'wedding_date' => ['required']
        ]);
        //adding bride information
        $fiance = new Fiance;
        $fiance->full_name = $fiance->second_name = $data['bride_name'];
        $fiance->type = 'bride';
        $fiance->description = "Facilis est nemo corrupti porro. Eligendi suscipit reprehenderit non quam non delectus. Omnis dolores aspernatur aut aut sapiente beatae. Nisi consequuntur deserunt in inventore.";
        $fiance->birthday = "12/09/1992";
        $fiance->save();
        $bride_id = $fiance->id;
        //adding groom information
        $fiance = new Fiance;
        $fiance->full_name = $fiance->second_name = $data['groom_name'];
        $fiance->type = 'groom';
        $fiance->description = "Facilis est nemo corrupti porro. Eligendi suscipit reprehenderit non quam non delectus. Omnis dolores aspernatur aut aut sapiente beatae. Nisi consequuntur deserunt in inventore.";
        $fiance->birthday = "10/02/1993";
        $fiance->save();
        $groom_id = $fiance->id;
        //adding userweb
        $user = session('user');
        
        $userWeb = new UserWeb;
        $userWeb->template_id = $data['template_id'];
        $userWeb->user_id = $user['id'];
        $userWeb->bride_id = $bride_id;
        $userWeb->groom_id = $groom_id;
        $userWeb->wedding_date = $data['wedding_date'];
        $userWeb->save();
        $request->session()->put('userWeb', $userWeb);
        return redirect()->route('userwebs.index',$user['id']);
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
}
