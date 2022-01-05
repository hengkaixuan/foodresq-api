<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpiredTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expired', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ingredient_id');
            //$table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('ingredient_id')->references('id')->on('saved_ingredients'); 
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
        Schema::dropIfExists('expired');
    }
}
