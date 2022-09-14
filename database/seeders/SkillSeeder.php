<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("skills")->insert([
            [
                "name" => "PHP",
                "created_by" => 0,
                "updated_by" => 0,
                "deleted_by" => null,
                "created_at" => date('YmdHis'),
                "updated_at" => date('YmdHis')
            ],
            [
                "name" => "PostgreSQL",
                "created_by" => 0,
                "updated_by" => 0,
                "deleted_by" => null,
                "created_at" => date('YmdHis'),
                "updated_at" => date('YmdHis')
            ],
            [
                "name" => "API (JSON, REST)",
                "created_by" => 0,
                "updated_by" => 0,
                "deleted_by" => null,
                "created_at" => date('YmdHis'),
                "updated_at" => date('YmdHis')
            ],
            [
                "name" => "Version Control System (Gitlab, Github)",
                "created_by" => 0,
                "updated_by" => 0,
                "deleted_by" => null,
                "created_at" => date('YmdHis'),
                "updated_at" => date('YmdHis')
            ],
        ]);
    }
}
