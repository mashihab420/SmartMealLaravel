<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('main_user_id')->unsigned()->nullable(true);
            $table->string('username',200)->nullable();
            $table->string('email',150)->nullable();
            $table->string('phone',150)->nullable(false);
            $table->string('password',150)->nullable(false);
            $table->string('manager_unique_token',150)->nullable();
            $table->boolean('check_meal')->nullable();
            $table->timestamps();


            $table->foreign('main_user_id')
                ->references('id')
                ->on('mainusers')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
