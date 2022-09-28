<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    use HasFactory;

    /**
     * Provide soft delete related functionality
     */
    use SoftDeletes;

    protected $guarded = [];

    /**
     * Get the user 
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

     /**
     * Get the user 
     */
    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
}
