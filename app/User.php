<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'nickname',
        'gender',
        'dob',
        'email',
        'password',
        'home_number',
        'mobile_number',
        'work_number',
        'address',
        'bio',
        'avatar',
        'website',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'company',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * [recipes description]
     * User hasMany Recipes
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @return  [type]
     */
    public function recipes()
    {
        return $this->hasMany('App\Recipe');
    }

    /**
     * [favouriteRecipes description]
     * User hasMany Favourite Recipes
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @return  [type]
     */
    public function favouriteRecipes()
    {
        return $this->hasMany('App\Favourite', 'user_id');
    }

    /**
     * [reviews description]
     * User hasMany Reviews
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @return  [type]
     */
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * [allRecipeTags description]
     * New array of User Tags from their Recipes
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @return  [type]
     */
    public function allRecipeTags()
    {
        $tags = [];

        // Foreach User Recipe Tags
        foreach ($this->recipes as $key => $recipe) {

            // Make into new Array
            $tags = $recipe->tags->pluck('id')->toArray();
        }

        return Tag::whereIn('id', $tags)->get();
    }
}
