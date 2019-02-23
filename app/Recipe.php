<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    protected $fillable = ['user_id', 'title', 'description', 'prep_time', 'cook_time', 'servings', 'difficulty', 'slug'];

    /**
     * [tags description]
     * -- Recipes hasMany Tags
     * -- Tags hasMany Recipes
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @return  [type]
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'recipe_tag', 'recipe_id', 'tag_id');
    }

    /**
     * [user description]
     * Recipes belongsTo a User
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
     * [reviews description]
     * Recipes hasMany a Reviews
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @return  [type]
     */
    public function reviews()
    {
        return $this->hasMany('App\Review', 'recipe_id');
    }

    /**
     * [rating description]
     * Determine Overall Recipe Rating by all recipes
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @return  [type]
     */
    public function rating()
    {
        // Get Array of Ratings
        $array = $this->reviews()->pluck('rating')->toArray();

        //Calculate the average.
        $average = round(array_sum($array) / count($array));

        return $average;
    }
}
