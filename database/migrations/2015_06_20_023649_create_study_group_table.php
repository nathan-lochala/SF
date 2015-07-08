<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',2000);
            $table->string('description',2000)->nullable();
            $table->string('address',2000)->nullable();
            $table->integer('district_id')->nullable();
            $table->dateTime('meeting_time')->nullable();
            $table->string('frequency',2000)->nullable();
            $table->integer('is_active')->nullable();
            $table->integer('leader_member_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('study_groups');
    }
}
