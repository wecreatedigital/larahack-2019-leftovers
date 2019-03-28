<?php

namespace App;

use App\RecipeEvents\addRecipeIngredients;
use App\RecipeEvents\addRecipeSteps;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use addRecipeIngredients;
    use addRecipeSteps;

    protected $table = 'recipes';

    protected $guarded = [];

    protected $fillable = ['user_id', 'title', 'description', 'prep_time', 'cook_time', 'servings', 'difficulty', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        /**
         * [static description]
         * Add Global Likes Count method
         * @var [type]
         */
        static::addGlobalScope('LikesCount', function ($builder) {
            $builder->withCount('likes');
        });
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
        return $this->morphToMany(Tag::class, 'taggable');
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
     * [likes description]
     * A Recipe can haveMany likes
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-03-12
     * @return  [type]
     */
    public function likes()
    {
        return $this->morphMany(Like::class, 'liked');
    }

    /**
     * [like description]
     * A User can like a Recipe
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-03-12
     * @return  [type]
     */
    public function like()
    {
        $attributes = ['user_id' => auth()->id()];

        // If we did not find a record in the database that
        // matches the Current User and is liked by the current Recipe
        // thrn create that record
        if ( ! $this->likes()->where($attributes)->exists()) {
            $this->likes()->create($attributes);
        }
    }

    /**
     * [unlike description]
     * A User can unlike a Recipe
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-03-12
     * @return  [type]
     */
    public function unlike()
    {
        $attributes = ['user_id' => auth()->id()];

        // If we did find a record in the database that
        // matches the Current User and is liked by the current Recipe
        // then delete that record
        if ($this->likes()->where($attributes)->exists()) {
            $this->likes()->where($attributes)->delete();
        }
    }

    /**
         * [getLikesCountAttribute description]
         * Return x number of Likes
         *
         * @author  Christopher Kelker
         * @version 1.0.0
         * @date    2019-03-08
         * @return  [type]
         */
    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    /**
     * [path description]
     * Get Recipe absolute path
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-25
     * @return  [type]
     */
    public function path()
    {
        return "/recipes/{$this->slug}";
    }
}
