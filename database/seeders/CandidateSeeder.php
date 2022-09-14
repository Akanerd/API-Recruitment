<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("candidates")->insert([
            [
                "name" => "Frontend Web Programmer",
                "job_id" => 1,
                "name" => "Azzasafah",
                "email" => "Azzasafah@gmail.com",
                "phone" => "081805429182",
                "year" => "2001",
                "created_by" => 0,
                "updated_by" => 0,
                "deleted_by" => null,
                "created_at" => date('YmdHis'),
                "updated_at" => date('YmdHis')
            ],
        ]);
    }
}
