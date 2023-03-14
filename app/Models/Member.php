<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


    public function trainings(): array
    {
        $trainings = [];
        foreach (Training::all()->where('member_id', $this->id) as $training) {
            $trainings[] = [
                'id' => $training->id,
                'date' => $training->date,
                'department' => Department::find($training->department_id)->name,
            ];

        }
        return $trainings;
    }

    public function departments(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Department::class);
    }

    public function update(array $attributes = [], array $options = [])
    {
        if (! $this->exists) {
            return false;
        }

        foreach (Department::all() as $department) {
            if (key_exists("department_" . $department->name, $attributes)) {
                if (!in_array($department, $this->departments->toArray())) {
                    $this->departments()->attach($department);
                }
            } else {
                $this->departments()->detach($department);
            }
        }

        return $this->fill($attributes)->save($options);
    }

    public function hasDepartment(Department $department): bool
    {
        return $this->departments->contains($department);
    }
}
