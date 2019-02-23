<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Review;
use Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = Review::create([
            'recipe_id' => $request->input('recipe_id'),
            'user_id' => Auth::user()->id,
            'rating' => $request->input('rating'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $recipe = Recipe::find($request->input('recipe_id'));
        $review = Review::find($request->input('id'));

        if (
            is_object($recipe) && is_object($review) &&
            ($recipe->user_id == Auth::user()->id || $review->user_id == Auth::user()->id)
        ) {
            $review->update([
                'rating' => $request->input('rating'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $recipe = Recipe::find($request->input('recipe_id'));
        $review = Review::find($request->input('id'));

        if (
            is_object($recipe) && is_object($review) &&
            ($recipe->user_id == Auth::user()->id || $review->user_id == Auth::user()->id)
        ) {
            $delete = $review->delete();
            if ($delete) {
                return redirect()->back()->with('success', [
                    'Review was deleted successfully',
                ]);
            }

            return redirect()->back()->withErrors([
                'message',
                'Review was not deleted successfully',
            ]);
        }
        abort(404);
    }
}
