<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeStep extends Model
{
    protected $table = 'steps';

    protected $fillable = ['recipe_id', 'step', 'description'];

    protected $guarded = [];

    /**
     * [recipe description]
     * A Recipe Step belongsTo a Recipe
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
}
