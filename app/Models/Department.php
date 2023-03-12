<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Department extends Model
{
    use HasFactory;

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(
            Member::class,
            'members_departments',
            'department_id',
            'member_id'
        );
    }
}
