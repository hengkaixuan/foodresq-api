<?php

namespace App\Http\Controllers;
use App\Models\ConsumedIngredient;
use Carbon\Carbon;
use DateTime;
use DatePeriod;
use DateInterval;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class ConsumedIngController extends Controller
{
    public function index()
    {
        return ConsumedIngredient::all();
    }

    public function create(Request $request)
    {
        //get user
        //$user = auth()->user();

        $validatedData = $request->validate([
            'ingredient_name' => 'required|string|max:255',
            'expiry_date' => 'required',
        ]);

        $success = ConsumedIngredient::create([
            'user_id' => $request->user_id,
            'ingredient_name' => $validatedData['ingredient_name'],
            'expiry_date' => $validatedData['expiry_date'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ])->save();

        return $success;
    }

    // public function show(int $id)
    // {
    //     $saved = DB::table('consumed_ingredients')
    //                 ->where('user_id', '=', $id)
    //                 ->orderBy('expiry_date', 'asc')
    //                 ->get();

    //     return $saved;
    // }
}
