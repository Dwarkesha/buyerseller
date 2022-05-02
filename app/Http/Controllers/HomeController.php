<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile($id)
    {
        $userData = User::where('id', $id)->first();
        return view('profile', compact('userData'));
    }

    public function update(ProfileRequest $request)
    {
        $userId = $request->id;

        $userProfileData = array(
            'full_name' => $request->full_name,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'address' => $request->address,
        );

        User::where('id', $userId)->update($userProfileData);
        return redirect()->back();
    }

}
