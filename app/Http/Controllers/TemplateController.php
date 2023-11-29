<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\UserWeb;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   

        $data = Template::all();
        return view('template-choice.index',[
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }
    public function confirm(string $template_id)
    {   
        $user = session('user');
        $check = UserWeb::where('user_id', $user['id'])->first();
        if ($check) return redirect()->route('userwebs.index',$user['id']);
        $data = Template::findOrFail($template_id);
        return view('template-choice.confirm', [
            'template_id' => $template_id,
            'template_name' => $data['name'],
            'template_description' => $data['description'],
        ]);
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
        
        return view('template-choice.template.template' . $id,[
            'wedding_date' => null,
            'bride' => null,
            'groom' => null,
            'slides' => null,
            'events' => null,
            'loveStories' => null
        ]);
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
