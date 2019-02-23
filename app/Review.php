<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
        'recipe_id',
        'user_id',
        'rating',
        'title',
        'descriptions',
    ];

    /**
     * [user description]
     * Reviews belongsTo a User
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @return  [type]
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * [recipe description]
     * Reviews belongsTo a Recipe
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @return  [type]
     */
    public function recipe()
    {
        return $this->belongsTo('App\Recipe', 'recipe_id');
    }
}
