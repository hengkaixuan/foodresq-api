<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expired extends Model
{
    use HasFactory;
    protected $table = 'expired';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'ingredient_id',
        'created_at',
        'updated_at',
    ];
}
