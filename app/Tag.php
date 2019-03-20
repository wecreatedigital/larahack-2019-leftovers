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
     * Get all of the recipes that are assigned this tag
     *
     * @author Christopher Kelker - @date 2019-03-20
     * @editor  Christopher Kelker
     * @version 1.0.0
     * @return  [type]
     */
    public function recipes()
    {
        return $this->morphedByMany(Recipe::class, 'taggable');
    }
}
