<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("jobs")->insert([
            [
                "name" => "Frontend Web Programmer",
                "created_by" => 0,
                "updated_by" => 0,
                "deleted_by" => null,
                "created_at" => date('YmdHis'),
                "updated_at" => date('YmdHis')
            ],
            [
                "name" => "Backend Web Programmer  ",
                "created_by" => 0,
                "updated_by" => 0,
                "deleted_by" => null,
                "created_at" => date('YmdHis'),
                "updated_at" => date('YmdHis')
            ],
            [
                "name" => "Fullstack Web Programmer",
                "created_by" => 0,
                "updated_by" => 0,
                "deleted_by" => null,
                "created_at" => date('YmdHis'),
                "updated_at" => date('YmdHis')
            ],
            [
                "name" => "Quality Control",
                "created_by" => 0,
                "updated_by" => 0,
                "deleted_by" => null,
                "created_at" => date('YmdHis'),
                "updated_at" => date('YmdHis')
            ],
        ]);
    }
}
