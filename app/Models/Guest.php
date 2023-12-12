<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Guest extends Model
{
    use HasFactory;
    public function guestGroup()
    {
        return $this->belongsTo(GuestGroup::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeGuest(Builder $query, int $userID): Builder
    {
        return $query->where('user_id','=',$userID);
    }
    public function scopeComing(Builder $query): Builder
    {
        return $query->where('confirmation','=','Có');
    }
    public function scopeNotComing(Builder $query): Builder
    {
        return $query->where('confirmation','=','Chưa');
    }
    public function scopeNotConfirm(Builder $query): Builder
    {
        return $query->where('confirmation','<>','Có')->where('confirmation','<>','Chưa');
    }
}
