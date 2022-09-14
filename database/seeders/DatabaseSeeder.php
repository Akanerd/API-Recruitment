<?php

namespace Database\Seeders;

use App\Models\Candidates;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(JobSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(CandidateSeeder::class);
        $this->call(SkillSetSeeder::class);
    }
}
