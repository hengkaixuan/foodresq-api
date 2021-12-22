<?php

namespace App\Http\Controllers;
use App\Models\SavedIngredient;
use Carbon\Carbon;

use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        return SavedIngredient::all();
    }

    public function create(Request $request)
    {
        //get user
        //$user = auth()->user();

        $validatedData = $request->validate([
            'ingredient_name' => 'required|string|max:255',
        ]);

        $success = SavedIngredient::create([
            'user_id' => $request->user_id,
            'ingredient_name' => $validatedData['ingredient_name'],
            'expiry_date' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ])->save();

        return $success;
    }
}
