<?php

namespace App\RecipeEvents;

trait addRecipeSteps
{

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
