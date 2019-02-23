<?php

namespace App\Http\Controllers;

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
        dd($request->input('ingredients'));

        return view('search.results');
    }
}
