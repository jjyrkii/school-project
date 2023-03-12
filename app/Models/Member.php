<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'first_name',
        'street',
        'house_number',
        'postal_code',
        'city',
        'phone',
        'email',
        'birth_date',
        'join_date',
    ];


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
