<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utensil extends Model
{
    protected $table = 'utensils';

    protected $fillable = ['recipie_id', 'step', 'description'];
}
