<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = ['recipie_id', 'user_id', 'rating', 'title', 'descriptions'];
}
