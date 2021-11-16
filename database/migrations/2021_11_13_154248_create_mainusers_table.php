<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainusers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username',200)->nullable();
            $table->string('email',150)->nullable();
            $table->string('phone',150)->nullable(false);
            $table->string('password',150)->nullable(false);
            $table->string('admin_unique_token',150)->nullable();
            $table->boolean('check_meal')->nullable();
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
        Schema::dropIfExists('mainusers');
    }
}
