<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndUser extends Model
{
    use HasFactory;

    /**
     * Get the end-user's user.
     */
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
