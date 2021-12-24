<?php

namespace App\Http\Controllers;
use App\Models\SavedIngredient;
use Carbon\Carbon;
use DateTime;
use DatePeriod;
use DateInterval;
use Illuminate\Support\Facades\DB;


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
            'expiry_date' => 'required',
        ]);

        $success = SavedIngredient::create([
            'user_id' => $request->user_id,
            'ingredient_name' => $validatedData['ingredient_name'],
            'expiry_date' => $validatedData['expiry_date'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ])->save();

        return $success;
    }

    public function show(int $id)
    {
        $saved = DB::table('saved_ingredients')
                    ->where('user_id', '=', $id)
                    ->orderBy('expiry_date', 'desc')
                    ->get();

        return $saved;
    }

    public function delete(int $id)
    {
        $success = DB::table('saved_ingredients')
                      ->where('id', '=', $id)
                      ->delete();
        return $success;
    }
}
