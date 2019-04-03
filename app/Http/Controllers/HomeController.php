<?php

namespace App\Http\Controllers;

use App\Option;
use App\Recipe;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ingredients = Option::ingredients()->get();

        $popular_recipes = Recipe::popularRecipes(3)->get();

        return view('home', [
            'ingredients' => $ingredients,
            'popular_recipes' => $popular_recipes,
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }
}
