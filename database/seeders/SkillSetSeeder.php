<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SkillSetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        \DB::table("skill_set")->insert([
            [
                "candidate_id" => "1",
                "skill_id"=>"1"
            ]
        ]);
    }
}
