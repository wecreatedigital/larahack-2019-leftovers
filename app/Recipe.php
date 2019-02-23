<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipies';

    protected $fillable = ['user_id', 'title', 'description', 'time'];
}
