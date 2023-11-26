<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWeb extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function template(){
        return $this->hasOne(Template::class);
    }
    public function fiances(){
        return $this->hasMany(Fiance::class);
    }
    public function scopeUserWeb(Builder $query, int $userID): Builder
    {
        return $query->where('user_id','=',$userID);
    }
}
