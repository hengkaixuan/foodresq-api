<?php

namespace App\Http\Controllers;
use App\Models\Recipes;
use Carbon\Carbon;

use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function index()
    {
        return Recipes::withSelectRecipe()->get();
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'recipe_name' => 'required|string|max:255',
            'recipe_image' => 'string|max:255',
            'recipe_level' => 'required',
            'recipe_ingredients' => 'string',
            'recipe_instructions' => 'string',
            'recipe_source' => 'string|max:255',
            'recipe_video' => 'string|max:255',
        ]);

        $success = Recipes::create([
            'recipe_name' => $validatedData['recipe_name'],
            'recipe_image' => $validatedData['recipe_image'],
            'recipe_level' => $validatedData['recipe_level'],
            'recipe_ingredients' => $validatedData['recipe_ingredients'],
            'recipe_instructions' => $validatedData['recipe_instructions'],
            'recipe_source' => $validatedData['recipe_source'],
            'recipe_video' => $validatedData['recipe_video'],
            'created_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ])->save();

        return $success;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
