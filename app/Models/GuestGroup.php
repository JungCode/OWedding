<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestGroup extends Model
{
    use HasFactory;

    public function guest()
    {
        return $this->hasMany(Guest::class);
    }

}
