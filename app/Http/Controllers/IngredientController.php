<?php

namespace App\Http\Controllers;
use App\Models\SavedIngredient;
use App\Models\Expired;
use App\Models\User;
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
                    ->orderBy('expiry_date', 'asc')
                    ->get();

        return $saved;
    }

    public function checkExpired(int $ing_ID, int $id)
    {   
        $saved = IngredientController::show($id);     
        $check = Expired::where('ingredient_id', '=', $ing_ID)-> exists();

        if(!$check){
            $success = Expired::create([
                'ingredient_id' => $ing_ID,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ])->save();

            User::where('id', $id)->increment('wasted', 1);
            
            return $success;
        }
        
    }

    public function delete(int $id)
    {
        $success = DB::table('saved_ingredients')
                      ->where('id', '=', $id)
                      ->delete();
        return $success;
    }
}
