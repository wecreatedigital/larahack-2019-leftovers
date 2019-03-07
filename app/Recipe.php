<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    protected $guarded = [];

    protected $fillable = ['user_id', 'title', 'description', 'prep_time', 'cook_time', 'servings', 'difficulty', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

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
        return "/recipes/{$this->slug}";
    }

    /**
     * [addIngredient description]
     * Add a Ingredient to a Recipe
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-26
     * @param   [type]     $ingredient
     */
    public function addIngredient($ingredient)
    {
        $this->ingredients()->create($ingredient);
    }

    /**
     * [addIngredient description]
     * Add Ingredients to a Recipe
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-26
     * @param   [type]     $ingredients
     */
    public function addIngredients($ingredients)
    {
        // Remove any nullable instances
        $ingredients = array_filter($ingredients);

        // Make sure array is not empty
        if (count($ingredients) < 1 && ! empty($ingredients)) {
            return false;
        }

        // Loop through Recipe Ingredients
        foreach ($ingredients as $key => $ingredient) {

            // Explode string to get values
            $ingredient = explode('|', $ingredient);

            // Add Ingredient using relationship creator instance
            $this->addIngredient([
                'option_id' => $ingredient[0],
                'amount' => $ingredient[1],
                'unit' => $ingredient[2],
            ]);
        }
    }

    /**
     * [addStep description]
     * Add a Step to a Recipe
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-26
     * @param   [type]     $step
     */
    public function addStep($step)
    {
        $this->steps()->create($step);
    }

    /**
     * [addStep description]
     * Add Steps to a Recipe
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-26
     * @param   [type]     $step
     */
    public function addSteps($steps)
    {
        // Remove any nullable instances
        $steps = array_filter($steps);

        // Make sure array is not empty
        if (count($steps) < 1 && ! empty($steps)) {
            return false;
        }

        // Loop through Recipe Steps
        foreach ($steps as $key => $description) {

            // Add Step using relationship creator instance
            $this->addStep([
                'step' => $key + 1,
                'description' => $description,
            ]);
        }
    }
}
