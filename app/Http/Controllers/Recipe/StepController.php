<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = Recipe::find($request->input('recipe_id'));

        if (is_object($recipe) && $recipe->user_id == Auth::user()->id) {
            $step = Step::create([
                'recipe_id' => $request->input('recipe_id'),
                'step' => $request->input('step'),
                'description' => $request->input('description'),
            ]);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Step $step)
    {
        $recipe = Recipe::find($request->input('recipe_id'));
        $step = Step::find($request->input('id'));

        if (
            is_object($recipe) && is_object($step) &&
            $recipe->user_id == Auth::user()->id
        ) {
            $step->update([
                'recipe_id' => $request->input('recipe_id'),
                'step' => $request->input('step'),
                'description' => $request->input('description'),
            ]);
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function destroy(Step $step)
    {
        $recipe = Recipe::find($request->input('recipe_id'));
        $step = Step::find($request->input('id'));

        if (
            is_object($recipe) && is_object($step) &&
            $recipe->user_id == Auth::user()->id
        ) {
            $delete = $step->delete();
            if ($delete) {
                return redirect()->back()->with('success', ['Step was deleted successfully']);
            }

            return redirect()->back()->withErrors(['message', 'Step was not deleted successfully']);
        }
        abort(404);
    }
}
