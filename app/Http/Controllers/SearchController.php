<?php

namespace App\Http\Controllers;

use App\Option;
use App\Recipe;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function getResults(Request $request)
    {
        $recipes = Recipe::with('user')->whereHas('ingredients', function ($query) use ($request) {
            $query->where('option_id', $request->input('ingredients'));
        })->get();

        $ingredients = Option::ingredients()->get();

        if ($request->ajax()) {
            $html = \View::make('search.results', [
                'recipes' => $recipes,
            ])->render();

            return response()->json([
                'html' => $html,
                'title' => $recipes->count().' search results',
                'url' => url('/search/results?'.http_build_query($request->all())),
            ]);
        }

        return view('search.index', [
            'recipes' => $recipes,
            'ingredients' => $ingredients,
            'request' => $request,
        ]);
    }
}
