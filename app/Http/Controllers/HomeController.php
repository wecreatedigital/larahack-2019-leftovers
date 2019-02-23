<?php

namespace App\Http\Controllers;

use App\Option;

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

        return view('home', [
            'ingredients' => $ingredients,
        ]);
    }
}
