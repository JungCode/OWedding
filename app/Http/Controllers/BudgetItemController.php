<?php

namespace App\Http\Controllers;

use App\Models\BudgetItem;
use Illuminate\Http\Request;

class BudgetItemController extends Controller
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
        $data = $request->validate([
            'id_category' => ['required'],
            'iname' => ['required', 'min:3'],
            'item_expected' => [],
            'item_actual' => []
        ]);
        $budgetItem = new BudgetItem;
        $budgetItem->item_name = $data['iname'];
        $budgetItem->budget_category_id = $data['id_category'];
        $budgetItem->expected_cost = ($data['item_expected'] == null) ? 0 : $data['item_expected'];
        $budgetItem->actual_costs = ($data['item_actual'] == null) ? 0 : $data['item_actual'];
        $budgetItem->save();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'id_category' => ['required'],
            'iname' => ['required', 'min:3'],
            'item_expected' => [],
            'item_actual' => []
        ]);
        $budgetItem = BudgetItem::findOrFail($id);
        $budgetItem->item_name = $data['iname'];
        $budgetItem->budget_category_id = $data['id_category'];
        $budgetItem->expected_cost = ($data['item_expected'] == null) ? 0 : $data['item_expected'];
        $budgetItem->actual_costs = ($data['item_actual'] == null) ? 0 : $data['item_actual'];
        $budgetItem->save();
        return redirect()->route('budgetCategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $budgetItem = BudgetItem::findOrFail($id);
        $budgetItem->delete();
        return redirect()->route('budgetCategories.index');
    }
}
