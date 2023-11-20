<?php

namespace App\Http\Controllers;

use App\Models\BudgetCategory;
use App\Models\BudgetItem;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class BudgetCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = session('user');
        $total_all_ec = 0;
        $total_all_ac = 0;
        $count = 0;
        $budgetCategories = BudgetCategory::budgetCategories($user['id'])->get();
        foreach($budgetCategories as $budgetCategory){
            $budgetItems = BudgetItem::itemByCategory($budgetCategory['id'])->get();
            foreach($budgetItems as $budgetItem){
                $total_all_ec += $budgetItem['expected_cost'];
                $total_all_ac += $budgetItem['actual_cost'];
                $count++;
            }
        }
        $User = User::findOrFail($user['id']);
        $completedCount = Task::completedTask($user['id'])->count();
        $tasks = Task::task($user['id'])->count();
        return view('weddingBudget.budget',[
            'budgetCategories' => $budgetCategories, 
            'userid' => $user['id'], 
            'currentBudget' => $User->current_budget,
            'total_all_ac' => $total_all_ac,
            'total_all_ec' => $total_all_ec,
            'count' => $count,
            'taskPercent' => $completedCount/$tasks*100
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
