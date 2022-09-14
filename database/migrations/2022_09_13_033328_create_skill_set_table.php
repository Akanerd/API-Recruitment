<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_set', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');;
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skill_set', function (Blueprint $table) {
            $table->dropForeign('skill_set_candidate_id_foreign');
            $table->dropForeign('skill_set_skill_id_foreign');
        });
        Schema::dropIfExists('skill_set');
    }
}
