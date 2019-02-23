<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    /**
     * [profile description]
     * Write Description here...
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-01-10
     * @return  [type]
     */
    public function profile()
    {
        // Current User
        $user = User::with('recipes.reviews')->first();

        return view('auth.profile', [
            'user' => $user,
        ]);
    }
}
