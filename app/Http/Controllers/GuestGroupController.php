<?php

namespace App\Http\Controllers;

use App\Models\GuestGroup;
use Illuminate\Http\Request;

class GuestGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $guestGroup = new GuestGroup;
        $guestGroup->group_name = $request->input('group_name');
        $guestGroup->save();

        return redirect()->route('guest.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(GuestGroup $guestGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuestGroup $guestGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guestGroup = GuestGroup::findOrFail($id);
        $guestGroup->group_name = $request->input('group_name');
        $guestGroup->save();
       
        return redirect()->route('guest.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuestGroup $guestGroup)
    {
        //
    }
}
