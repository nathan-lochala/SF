<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_test', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->longText('first_name')->index();
            $table->longText('last_name')->nullable()->index();
            $table->integer('family_id')->nullable(); //Which family does this member belong to?
            $table->longText('email')->nullable()->index();
            $table->longText('mobile')->nullable()->index();
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
        Schema::drop('members_test');
    }
}
