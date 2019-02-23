<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:30'],
            'lastname' => ['required', 'string', 'max:30', 'different:firstname'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * [create description]
     * Create a new User with validation rules
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @param   array      $data
     * @return  [type]
     */
    protected function create(array $data)
    {
        // If somehow the randomly generated username exists, loop again...
        do {
            $username = substr(preg_replace('/[0-9]+/', '', strtolower($data['firstname'])).mt_rand(100, 1000000), 0, 20);
        } while (User::where('username', $username)->count() > 0);

        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'username' => $username,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => '/images/noavatar.png',
        ]);
    }
}
