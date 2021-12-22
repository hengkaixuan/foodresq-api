<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedIngredient extends Model
{
    use HasFactory;
    protected $table = 'saved_ingredients';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'ingredient_name',
        'expiry_date',
        'created_at',
        'updated_at',
    ];
}
