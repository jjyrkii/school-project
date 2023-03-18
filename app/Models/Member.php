<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\VarDumper\Caster\DateCaster;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'membership_id',
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


    public function trainings()
    {
        return Training::all()->where('member_id', '=', $this->id)->all();
    }

    public function departments(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Department::class);
    }

    public function update(array $attributes = [], array $options = [])
    {
        if (!$this->exists) {
            return false;
        }

        foreach (Department::all() as $department) {
            if (key_exists("department_" . $department->name, $attributes)) {
                if (!$this->departments()->where('id', '=', $attributes['department_' . $department->name])->exists()) {
                    $this->departments()->attach($department);
                }
            } else {
                $this->departments()->detach($department);
            }
        }

        return $this->fill($attributes)->save($options);
    }

    public function hasBirthday(): bool
    {
        $birthDay = new \DateTime($this->birth_date);
        $today = new \DateTime('today', new \DateTimeZone('Europe/Berlin'));
        return $birthDay->format('d') === $today->format('d') && $birthDay->format('m') === $today->format('m');
    }

    public function getTotalFee(): int
    {
        $departments = $this->departments();
        if ($departments->exists()) {
            if ($departments->count() > 1) {
                return 20;
            }
            return $departments->first()->fee;
        }
        return 0;
    }

//    public function canGetLicence(): bool
//    {
//        $trainings = Training::where('member_id')
//
////        $startDate = $this->join_date;
////        $endDate = \Date::today();
////        $trainings = $this->trainings();
////        $relevantTrainings = [];
////        foreach (Training::where() as $training) {
////            if ($training->date )
////        }
//    }

    public function hasDepartment(Department $department): bool
    {
        return $this->departments->contains($department);
    }

}
