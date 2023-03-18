<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\Member::factory(100)->create();
    }
}
