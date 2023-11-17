<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BudgetItem extends Model
{
    use HasFactory;

    public function budgetCategory()
    {
        return $this->belongsTo(BudgetCategory::class);
    }
    protected $fillable = [
        'item_name',
        'budget_category_id',
        'expected_cost',
        'actual_costs',
    ];
    public function scopeItemByCategory(Builder $query, string $budget_category_id ): Builder
    {
        return $query->where('budget_category_id',$budget_category_id );
    }
}
