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
            $table->string('first_name',2000)->index();
            $table->string('last_name',2000)->nullable()->index();
            $table->integer('family_id')->nullable(); //Which family does this member belong to?
            $table->string('email',2000)->nullable()->index();
            $table->string('mobile',2000)->nullable()->index();
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
