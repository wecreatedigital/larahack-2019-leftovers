<?php

namespace App\Http\Controllers;

use App\Recipe;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Validator;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();

        return View::make('recipes.recipes-index', [
            'recipes' => $recipes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('recipes.recipes-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Validation Rules
        $rules = array(
            'title' => 'nullable|string|max:15',
            'description' => 'nullable|string|different:title',
            'time' => 'nullable|string|max:30',
        );

        // Validation Messages
        $messages = array(

            // Title validation messages
            'title.required' => 'Title is required!',

            // Description validation messages
            'description.required' => 'Description is required!',

            // Time validation messages
            'time.required' => 'Time is required!',
        );

        // Validate Request against rules
        $validator = Validator::make($request->all(), $rules, $messages);

        // If Validation fails
        if ($validator->fails()) {
            return response()->back(array('errors' => $validator->getMessageBag()->toArray()));
        }

        // Create new Recipe
        $review = Recipe::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'time' => $request->input('time'),
        ]);

        return redirect()->back()->with('message', 'Successfully created Recipe!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
    }
}
