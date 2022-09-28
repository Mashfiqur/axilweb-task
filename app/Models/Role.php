<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
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
    public function user_roles()
    {
        return $this->hasMany(UserRole::class);
    }
    
}
