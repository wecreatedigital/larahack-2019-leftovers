<?php

namespace App\Http\Controllers;

use Recipe;
use View;

class RecipeController extends Controller
{
    public function Index()
    {
        // $recipes = Recipe::all();

        return View::make('recipe.recipes-index', []);
    }
}
