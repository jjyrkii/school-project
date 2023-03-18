<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * @param array<Training> $trainings
     * @return bool
     */
    public function canGetLicence(array $trainings): bool
    {
        $counts = [];
        $lastYear = (new \DateTime())->sub(new \DateInterval('P1Y'));
        foreach ($trainings as $training) {
            $dateObj = \DateTime::createFromFormat('Y-m-d', $training->date);
            if ($dateObj >= $lastYear) {
                $month = $dateObj->format('Y-m');
                if (!isset($counts[$month])) {
                    $counts[$month] = 0;
                }
                $counts[$month]++;
            }
        }

        $totalDates = array_sum($counts);
        $totalMonths = count($counts);
        if ($totalMonths == 12 || $totalDates >= 18) {
            return true;
        }
        return false;
    }

    public function hasDepartment(Department $department): bool
    {
        return $this->departments->contains($department);
    }

    public function fullName(): string
    {
        return $this->first_name . ' ' . $this->name;
    }

}
