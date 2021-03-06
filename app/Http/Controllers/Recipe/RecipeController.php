<?php

namespace App\Http\Controllers;

use App\Option;
use App\Recipe;
use AppHelper;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Validator;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);

        /**
         * [Validator description]
         * Validate array size against parameters
         * @var [type]
         */
        Validator::extend('check_array', function ($attribute, $value, $parameters, $validator) {
            if (count($value) <= $parameters[0]) {
                return false;
            }

            return true;
        });
    }
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
        $ingredients = Option::ingredients()->get();

        return view('recipes.recipes-add', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Rules
        $rules = array(

            'recipe_title' => 'required|string|max:15',
            'recipe_description' => 'required|string|different:recipe_title',
            'recipe_servings' => 'nullable',
            'recipe_difficulty' => 'nullable',
            'recipe_ingredients' => 'check_array:1',
            'recipe_utensils' => '',
            'recipe_prep_time' => 'required|string',
            'recipe_cook_time' => 'required|string',
            'recipe_step' => 'check_array:1',
            'recipe_feature_image' => 'required',
        );
        // Validation Messages
        $messages = array(

            // Recipe Title validation messages
            'recipe_title.required' => 'Give your recipe a Title.',

            // Recipe Description validation messages
            'recipe_description.required' => 'Give your recipe a Description.',

            // Recipe Feature Image validation messages
            'recipe_feature_image.required' => 'A Recipe Feature Image is required.',

            // Recipe Ingredients validation messages
            'recipe_ingredients.check_array' => 'Please add more ingredients.',
        );

        // Validate Request against rules
        $validator = Validator::make($request->all(), $rules, $messages);

        // If Validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create new Recipe
        $recipe = Recipe::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('recipe_title'),
            'description' => $request->input('recipe_description'),
            'prep_time' => $request->input('recipe_prep_time'),
            'cook_time' => $request->input('recipe_cook_time'),
            'servings' => $request->input('recipe_servings'),
            'difficulty' => $request->input('recipe_difficulty'),
            'slug' => AppHelper::createSlug($request->input('recipe_title')),
        ]);

        // Create Recipe Ingredients
        $recipe->addIngredients($request->input('recipe_ingredients'));

        // Create Recipe Steps
        $recipe->addSteps($request->input('recipe_step'));

        return redirect('/my-recipes')->with('message', 'Successfully created Recipe!');
    }

    /**
     * [show description]
     * Accept the parameter as a recipe if the slug exists
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-03-07
     * @param   Recipe     $recipe
     * @return  [type]
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.recipe-view', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);

        return View::make('recipes.recipes-edit', [
            'recipe' => $recipe,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        $review = Recipe::where('id', $id)->update([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'prep_time' => $request->input('prep_time'),
            'cook_time' => $request->input('cook_time'),
            'servings' => $request->input('servings'),
            'difficulty' => $request->input('difficulty'),
            'slug' => AppHelper::createSlug($request->input('title')),
        ]);

        return redirect('/my-recipes')->with('message', 'Successfully updated Recipe!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();

        return redirect('/my-recipes')->with('message', 'Successfully deleted Recipe!');
    }

    public function like(Recipe $recipe, Request $request)
    {
        if ($request->input('boolean') == 'true') {
            $recipe->like();
        } else {
            $recipe->unlike();
        }

        return $recipe->likes;
    }
}
