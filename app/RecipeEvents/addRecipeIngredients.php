<?php

namespace App\RecipeEvents;

trait addRecipeIngredients
{

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
}
