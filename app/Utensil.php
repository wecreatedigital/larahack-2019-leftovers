<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utensil extends Model
{
    protected $table = 'utensils';

    protected $fillable = ['recipe_id', 'step', 'description'];
}
