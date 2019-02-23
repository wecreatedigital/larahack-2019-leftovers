<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Settings Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Current User Settings for the application.
    | The controller uses multiple functions to update settings listed below:
    |
    | * updateProfileSettings
    | * updateBasicSettings
    | * updateContactSettings
    | * updateSecuritySettings
    | * updateAvatarSettings
    |
    */

    /**
     * [__construct description]
     * New Validation Rules
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-01-10
     */
    public function __construct()
    {
        $this->middleware('auth');

        /**
         * [auth_password description]
         * Validate if Current User entered their correct current password
         * @var [type]
         */
        Validator::extend('auth_password', function ($attribute, $value) {
            if (Hash::check($value, Auth::user()->password)) {
                return true;
            }
        });

        /**
         * [username_taken description]
         * Only accept Username if not taken by other User
         * and Current User
         * @var [type]
         */
        Validator::extend('username_taken', function ($attribute, $value) {
            if (User::where('username', $value)->where('id', '!=', Auth::user()->id)->exists() == false) {
                return true;
            }
        });

        /**
         * [gender_input description]
         * Validate gender hasn't been altered
         * @var [type]
         */
        Validator::extend('gender_input', function ($attribute, $value) {
            if ( ! is_null($value) && in_array($value, ['Male', 'Female', 'Other'])) {
                return true;
            }
        });

        /**
         * [email_taken description]
         * Validate if email address is already taken
         * @var [type]
         */
        Validator::extend('email_taken', function ($attribute, $value) {
            $other_users = User::where('email', $value)->where('id', '!=', Auth::user()->id)->exists();
            if ($other_users != true) {
                return true;
            }
        });
    }

    /**
     * [updateProfileSettings description]
     * Update User Profile Settings here...
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-01-03
     * @param   Request    $request
     * @return  [type]
     */
    public function updateProfileSettings(Request $request)
    {
        $user = Auth::user();

        // Validation Rules
        $rules = array(
            'username' => 'required|string|max:30|username_taken',
            'nickname' => 'nullable|string|max:15|different:username',
            'bio' => 'nullable|string',
            'company' => 'nullable|string|max:30',
        );

        // Validation Messages
        $messages = array(
            // Username validation messages
            'username.required' => 'Username is required!',
            'username.string' => 'Username characters invalid!',
            'username.max' => 'That Username is too long, choose another!',
            'username.username_taken' => 'That username is taken, choose another!',

            // Nickname validation messages
            'nickname.string' => 'Nickname characters invalid!',
            'nickname.max' => 'That Nickname is too long, choose another!',
            'nickname.different' => 'Nickname cannot be the same as Username!',

            // Bio validation messages
            'bio.string' => 'Bio characters invalid!',

            // Company validation messages
            'company.string' => 'Company characters invalid!',
            'company.max' => 'That Company is too long, choose another!',
        );

        // Validate Request against rules
        $validator = Validator::make($request->all(), $rules, $messages);

        // If Validation fails
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        // Update Appropriate Profile Settings
        $user->username = $request->input('username');
        $user->nickname = $request->input('nickname');
        $user->bio = $request->input('bio');
        $user->company = $request->input('company');
        $user->save();

        return response()->json(true);
    }

    /**
     * [updateBasicSettings description]
     * Update User Basic Settings here...
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-01-03
     * @param   Request    $request
     * @return  [type]
     */
    public function updateBasicSettings(Request $request)
    {
        $user = Auth::user();

        // Validation Rules
        $rules = array(
            'settings_firstname' => 'required|string|max:30',
            'settings_lastname' => 'required|string|max:30|different:settings_firstname',
            'gender' => 'nullable|string|max:6|gender_input',
            'dob' => 'nullable|date',
        );

        // Validation Messages
        $messages = array(
            // Firstname validation messages
            'settings_firstname.required' => 'Firstname is required!',
            'settings_firstname.string' => 'Firstname characters invalid!',
            'settings_firstname.max' => 'That Firstname is too long, choose another!',

            // Lastname validation messages
            'settings_lastname.required' => 'Lastname is required!',
            'settings_lastname.string' => 'Lastname characters invalid!',
            'settings_lastname.max' => 'That Lastname is too long, choose another!',
            'settings_lastname.different' => 'Lastname cannot be the same as Firstname!',

            // Gender validation messages
            'gender.string' => 'Gender characters invalid!',
            'gender.max' => 'That Gender is too long, choose another!',
            'gender.gender_input' => 'Gender input was wrong!',

            // Date of birth validation messages
            'dob.date' => 'Date of birth must be a date!',
        );

        // Validate Request against rules
        $validator = Validator::make($request->all(), $rules, $messages);

        // If Validation fails
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        // Update Appropriate Basic Settings
        $user->firstname = $request->input('settings_firstname');
        $user->lastname = $request->input('settings_lastname');
        $user->gender = $request->input('gender');
        $user->dob = $request->input('dob');
        $user->save();

        return response()->json(true);
    }

    /**
     * [updateContactSettings description]
     * Update User Contact Settings here...
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-01-03
     * @param   Request    $request
     * @return  [type]
     */
    public function updateContactSettings(Request $request)
    {
        $user = Auth::user();

        // Validation Rules
        $rules = array(
            'email_address' => 'required|email|string|email_taken',
            'website' => 'nullable|url|max:30',
            'home_number' => 'nullable|numeric',
            'mobile_number' => 'nullable|numeric',
            'work_number' => 'nullable|numeric',
            'address' => 'nullable',
        );

        // Validation Messages
        $messages = array(
            // Email Address validation messages
            'email_address.required' => 'Email Address is required!',
            'email_address.email' => 'This field must be an email!',
            'email_address.string' => 'Email Address characters invalid!',
            'email_address.email_taken' => 'Email address taken, please choose another!',

            // Website URL validation messages
            'website.url' => 'This field must be a URL!',
            'website.max' => 'That Website URL is too long, choose another!',

            // Home Number validation messages
            'home_number.numeric' => 'This field must be numeric!',

            // Mobile Number validation messages
            'mobile_number.numeric' => 'This field must be numeric!',

            // Work Number validation messages
            'work_number.numeric' => 'This field must be numeric!',
        );

        // Validate Request against rules
        $validator = Validator::make($request->all(), $rules, $messages);

        // If Validation fails
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        // Update Appropriate Contact Settings
        $user->email = $request->input('email_address');
        $user->website = $request->input('website');
        $user->home_number = $request->input('home_number');
        $user->mobile_number = $request->input('mobile_number');
        $user->work_number = $request->input('work_number');
        $user->address = $request->input('address');
        $user->save();

        return response()->json(true);
    }

    /**
     * [updateSecuritySettings description]
     * Update User Security Settings here...
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-01-03
     * @param   Request    $request
     * @return  [type]
     */
    public function updateSecuritySettings(Request $request)
    {
        $user = Auth::user();

        // Validation Rules
        $rules = array(
            'current_password' => 'required|string|auth_password',
            'new_password' => 'required|min:6|string|different:current_password',
            'confirm_password' => 'required|min:6|string|same:new_password',
        );

        // Validation Messages
        $messages = array(
            // Current Password validation messages
            'current_password.required' => 'Current Password is required!',
            'current_password.string' => 'Current Password characters invalid!',
            'current_password.auth_password' => 'This field must match your Current Password!',

            // New Password validation messages
            'new_password.required' => 'New Password is required!',
            'new_password.min' => 'This field must be numeric!',
            'new_password.string' => 'New Password characters invalid!',
            'new_password.different' => 'This field must be different to your Current Password!',

            // Confirm Password validation messages
            'confirm_password.required' => 'Confirm New Password is required!',
            'confirm_password.min' => 'This field must be numeric!',
            'confirm_password.string' => 'Confirm New Password characters invalid!',
            'confirm_password.same' => 'This field must be the same as your New Password!',
        );

        // Validate Request against rules
        $validator = Validator::make($request->all(), $rules, $messages);

        // If Validation fails
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        // Update Appropriate Security Settings
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return response()->json(true);
    }

    /**
     * [updateAvatarSettings description]
     * Update the current User's Profile Photo using the Croppie plugin.
     *
     * See the following:
     * -- https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.min.js
     * -- https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.min.css
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-01-28
     * @param   Request    $request
     * @return  [type]
     */
    public function updateAvatarSettings(Request $request)
    {
        // Variables
        $user = Auth::user();
        $image = $request->image;
        $oldPhotoUrl = $user->avatar;

        // Store new Image
        list($type, $image) = explode(';', $image);
        list(, $image) = explode(',', $image);
        $image = base64_decode($image);
        $imageName = $user->id.'_'.time().'.png';
        $path = public_path('storage/profiles/'.$imageName);
        file_put_contents($path, $image);

        // Return Image URL
        $disk = Storage::disk('public');
        $url = 'storage/profiles/'.$imageName;

        // Next, we'll update this URL on the local user instance and save it to the DB
        // so we can access it later. Then we will delete the old photo from storage
        // since we'll no longer need to access it for this specific user profile.
        $user->forceFill([
            'avatar' => $url,
        ])->save();

        // Now that the new Profile Photo has been stored we can go forward and
        // delete the old Profile Photo. Using the existing old Photo URL,
        // we can find the photo in the disk folder and delete it where the name
        // matches.
        if (preg_match('/profiles\/(.*)$/', $oldPhotoUrl, $matches)) {
            $disk->delete('profiles/'.$matches[1]);
        }

        // Return link to view new Photo
        return response()->json(['status' => true, 'avatar' => $url]);
    }
}
