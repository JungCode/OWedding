<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'period'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function toggleComplete()  {
        $this->completed = !$this->completed;
        $this->save();
    }
    public function scopeTitle(Builder $query, string $title) : Builder {
        return $query->where('title', 'LIKE', '%' . $title . '%');
    }

    public function scopePeriod(Builder $query, string $period) : Builder {
        return $query->where('period', 'LIKE', '%' . $period . '%');
    }

    public function scopeTask(Builder $query, int $userID): Builder
    {
        return $query->where('user_id','=',$userID);
    }

    

    

    

    


    

    
}
