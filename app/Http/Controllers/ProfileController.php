<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userRegister(Request $request)
    {
        $image=request()->file('image')->getClientOriginalName();
    
        $request->image->storeAs('public/images', $image);

            User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'sex'      => $request->sex,
            'skill' => implode(',',$request->skill),
            'experience_year' => $request->experience_year,
            'birthday' => $request->birthday,
            'github' =>$request->github,
            'image' =>$image,
        ]);
        return redirect('/login');

    }
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        return view('profile.create');

    }

}
