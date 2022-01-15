<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('recipe_id');
            $table->string('recipe_name', 255);
            $table->string('recipe_image',255)->nullable();
            $table->enum('recipe_level', ['Beginner', 'Intermediate', 'Masterchef'])->default('Intermediate');
            $table->longText('recipe_ingredients')->nullable();
            $table->longText('recipe_instructions')->nullable();
            $table->string('recipe_source', 255)->nullable();
            $table->string('recipe_video', 255)->nullable();
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
        Schema::dropIfExists('recipes');
    }
}
