<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    // Table Name
    protected $table = 'ingredients';

    protected $guarded = [];

    protected $fillable = ['name', 'amount', 'unit'];

    // Append data to Model
    protected $appends = ['IngredientTitle'];

    /**
     * [recipe description]
     * A Ingredient belongsTo a Recipe
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-26
     * @return  [type]
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }

    /**
     * [option description]
     * A Option belongsTo a Recipe
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-26
     * @return  [type]
     */
    public function option()
    {
        return $this->belongsTo(Option::class, 'recipe_id');
    }

    /**
     * [getIngredientTitleAttribute description]
     * Get the full Ingredient title
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-19
     * @return  [type]
     */
    public function getIngredientTitleAttribute()
    {
        return $this->amount.' '.str_plural($this->unit, $this->amount).' '.$this->option->value;
    }
}
