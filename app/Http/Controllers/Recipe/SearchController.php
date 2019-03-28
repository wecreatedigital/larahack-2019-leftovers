<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Recipe;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();

        return view('recipes.recipes-all', compact('recipes'));
    }
}
