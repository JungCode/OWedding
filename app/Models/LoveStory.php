<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoveStory extends Model
{
    use HasFactory;
    public function userWeb(){
        return $this->belongsTo(UserWeb::class);
    }
}
