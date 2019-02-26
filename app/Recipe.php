<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    protected $guarded = [];

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
        return $this->hasMany(Review::class, 'recipe_id');
    }

    /**
     * [ingredients description]
     * Get a list of ingredients associated with the Recipe
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-26
     * @return  [type]
     */
    public function ingredients()
    {
        return $this->hasMany(RecipeIngredient::class, 'recipe_id');
    }

    /**
     * [steps description]
     * A Recipe hasMany RecipeStep
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-26
     * @return  [type]
     */
    public function steps()
    {
        return $this->hasMany(RecipeStep::class, 'recipe_id');
    }

    /**
     * Get a list of utensils associated with the recipe
     * @author Dean Appleton-Claydon
     * @date   2019-02-23
     */
    public function utensils()
    {
        return $this->belongsToMany('App\Option', 'recipe_utensils', 'recipe_id', 'option_id');
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
        if (count($array) > 0) {
            return round(array_sum($array) / count($array));
        }

        return 5;
    }

    public function getSlug()
    {
        return url('/recipe/'.$this->slug);
    }

    /**
     * [addIngredient description]
     * Add a Reply to a Thread
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-26
     * @param   [type]     $reply
     */
    public function addIngredient($ingredient)
    {
        $this->ingredients()->create($ingredient);
    }

    /**
     * [addStep description]
     * Add a Reply to a Thread
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-26
     * @param   [type]     $reply
     */
    public function addStep($step)
    {
        $this->steps()->create($step);
    }
}
