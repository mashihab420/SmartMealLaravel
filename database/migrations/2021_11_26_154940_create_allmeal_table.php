<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllmealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_meal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('manager_unique_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->double('breakfast')->nullable();
            $table->double('lunch')->nullable();
            $table->double('dinner')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();

            $table->foreign('manager_unique_id')
                ->references('id')
                ->on('mainusers')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('members')
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
        Schema::dropIfExists('all_meal');
    }
}
