<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $table = 'steps';

    protected $fillable = ['recipie', 'step', 'description'];
}
