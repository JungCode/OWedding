<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetCategory extends Model
{
    use HasFactory;

    public function budgetItems()
    {
        return $this->hasMany(BudgetItem::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeBudgetCategories(Builder $query, int $userID): Builder
    {
        return $query->where('user_id','=',$userID)->with('budgetItems');
    }
}
