<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietRecommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'weight', 'height', 'age', 'gender', 
        'activity', 'goal', 'calories_result', 
        'breakfast_menu', 'lunch_menu', 'dinner_menu'
    ];
}
