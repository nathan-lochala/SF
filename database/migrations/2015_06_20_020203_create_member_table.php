<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->text('first_name')->index();
            $table->text('last_name')->nullable()->index();
            $table->integer('user_id')->nullable()->index();
            $table->integer('family_id')->nullable(); //Which family does this member belong to?
            $table->text('email')->nullable()->index();
            $table->text('mobile')->nullable()->index();
            $table->integer('district_id')->nullable(); //Which district does this member live?
            $table->softDeletes();
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
        Schema::drop('members');
    }
}
