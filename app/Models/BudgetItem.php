<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetItem extends Model
{
    use HasFactory;

    public function budgetCategory(){
        return $this->belongsTo( BudgetCategory::class);
    }
    protected $fillable = [
        'item_name',
        'budget_category_id',
        'expected_cost',
        'actual_costs',
    ];
}
