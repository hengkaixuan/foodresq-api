<?php

namespace Database\Seeders;
use App\Models\User;

use App\Models\Recipes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Recipes::create([
            'recipe_name' => 'Mini Spring Rolls with Chicken Floss',
            'recipe_image' => 'https://s3.ap-southeast-1.amazonaws.com/foodresq.recipes/Mini+Spring+Roll.jpeg',
            'recipe_level' => 'Beginner',
            'recipe_ingredients' => 'frozen spring roll wrapper, chicken floss, egg, oil',
            'recipe_instructions' => 'Cut each of the spring roll wrapper into 4 smaller pieces. Lay the wrapper on a flat surface. Add 1 teaspoon of the chicken floss at the center of the skin. Fold in the two sides and roll it up tightly. Seal the edges with the beaten egg. Repeat the same until all wrappers are used up.',
            'recipe_source' => 'https://rasamalaysia.com/mini-spring-rolls-with-chicken-floss/',
            'recipe_video' => 'https://www.youtube.com/watch?v=_tfXmvmPi40',
        ])->save();

        User::create([
            'name' => 'User1',
            'password' => '12345678',
        ])->save();
    }
}
