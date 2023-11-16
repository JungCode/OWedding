<?php

namespace App\Http\Controllers;

use App\Models\BudgetCategory;
use App\Models\BudgetItem;
use Illuminate\Http\Request;

class BudgetCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = session('user');
        $budgetCategories = BudgetCategory::budgetCategories($user['id'])->get();
        return view('weddingBudget.budget',[
            'budgetCategories' => $budgetCategories, 
            'userid' => $user['id'], 
            'currentBudget' => $user['current_budget']
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
        $data = $request->validate([
            'id_user' => ['required'],
            'cname' => ['required', 'min:3']
        ]);
        $budgetCategory = new BudgetCategory;
        $budgetCategory->user_id = $data['id_user'];
        $budgetCategory->budget_category_name = $data['cname'];
        $budgetCategory->save();
        return redirect()->route('budgetCategories.index');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'id_user' => ['required'],
            'id_category' => ['required'],
            'cname' => ['required', 'min:3']
        ]);
        $budgetCategory = BudgetCategory::findOrFail( $id );
        $budgetCategory->user_id = $data['id_user'];
        $budgetCategory->budget_category_name = $data['cname'];
        $budgetCategory->save();
        return redirect()->route('budgetCategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $budgetCategory = BudgetCategory::findOrFail( $id );
        $budgetCategory->delete();
        return redirect()->route('budgetCategories.index');
    }
}
