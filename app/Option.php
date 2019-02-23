<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{

    /**
     * Shortcut for retreiving ingredients
     * @author Dean Appleton-Claydon
     * @date   2019-02-23
     */
    public function scopeIngredients()
    {
        return $this->where('type', 0)
                        ->orderBy('value', 'ASC');
    }

    /**
     * Shortcut for retreiving utensils
     * @author Dean Appleton-Claydon
     * @date   2019-02-23
     */
    public function scopeUtensils()
    {
        return $this->where('type', 1)
                        ->orderBy('value', 'ASC');
    }
}
