<?php

namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    /**
     * [viewProfile description]
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-01-10
     * @param   [type]     $id
     * @return  [type]
     */
    public function viewProfile($id)
    {
        $user = User::where('id', $id)->with('friends')->first();

        return view('auth.find-user-profile.view-profile', [
            'user' => $user,
        ]);
    }

    /**
     * [settings description]
     * Return Current User Profile Settings to edit/update/delete
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-01-10
     * @return  [type]
     */
    public function settings()
    {
        return view('auth.settings')->with('user', \Auth::user());
    }
}
