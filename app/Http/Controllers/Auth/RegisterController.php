<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'full_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'contact_no' => 'required|min:6|max:14',
            'address' => 'required',
            'password' => 'required|min:6|confirmed',
        ],
        [
            'full_name.required' => 'The Name field is required.',
            'email.required' => 'The Email address field is required.',
            'email.email' => 'Enter valid Email address field.',
            'email.unique' => 'Email address field is must be unique.',
            'contact_no.required' => 'The Contact Number field is required.',
            // 'contact_no.unique' => 'Contact Number field is must be unique.',
            'address.required' => 'The Address field is required.',
            'password.required' => 'The Password field is required.',
        ],
    
    );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'custom_id' => Str::random(8),
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'contact_no' => $data['contact_no'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),

        ]);
    }
}
