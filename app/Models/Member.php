<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    use HasFactory;

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(
            Department::class,
            'members_departments',
            'member_id',
            'department_id'
        );
    }
}
