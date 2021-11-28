<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('manager_unique_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(true);
            $table->double('grocery_cost')->nullable();
            $table->double('other_cost')->nullable(true);
            $table->String('description')->nullable();
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
        Schema::dropIfExists('expense');
    }
}
