<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //Table Name
    protected $table = 'tags';

    // Primary Key
    public $primaryKey = 'id';

    // Columns
    protected $fillable = ['name'];

    // Timestamps
    public $timestamps = true;

    /**
     * [recipes description]
     * -- Tags hasMany Recipes
     * -- Recipes hasMany Tags
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @return  [type]
     */
    public function recipes()
    {
        return $this->belongsToMany('App\Recipe', 'recipe_tag', 'tag_id', 'recipe_id');
    }
}
