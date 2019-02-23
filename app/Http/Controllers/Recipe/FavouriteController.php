<?php

namespace App\Http\Controllers;

use App\Favourite;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $favourite = Favourite::create([
            'recipe_id' => $request->input('recipe_id'),
            'user_id' => Auth::user()->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favourite $favourite)
    {
        $favourite = Favourite::find($request->input('id'));

        if (
            is_object($favourite) &&
            $favourite->user_id == Auth::user()->id
        ) {
            $delete = $favourite->delete();
            if ($delete) {
                return redirect()->back()->with('success', [
                    'Favourite was removed',
                ]);
            }

            return redirect()->back()->withErrors([
                'message',
                'Favourite was not removed',
            ]);
        }
        abort(404);
    }
}
