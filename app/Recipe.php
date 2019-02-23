<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    protected $fillable = ['user_id', 'title', 'description', 'time'];

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
}
