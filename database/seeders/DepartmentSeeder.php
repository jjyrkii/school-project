<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['Bogen', 8],
            ['Luftdruck', 10],
            ['Feuerwaffen', 15],
        ];

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'name' => $department[0],
                'fee'  => $department[1],
            ]);
        }
    }
}
