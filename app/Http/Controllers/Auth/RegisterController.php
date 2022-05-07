<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'sex'      => ['required'],
            // 'skill' =>['string'],
            // 'experience_year' =>['required', 'integer'],
            // 'birthday'=>['required'],
            // 'github' =>['required','string'],
            // 'image' =>['image'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
       $image=request()->file('image')->getClientOriginalName();
       //dd($image);
        //request()->file('image')->storeAs('public/images', $image);

        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'sex'      => $data['sex'],
        //     'skill' => $data['skill'],
        //     'experience_year' => $data['experience_year'],
        //     'birthday' => $data['birthday'],
        //     'github' =>$data['github'],
        //     'image' =>$image,
        // ]);
        // return $user;
    }

    public function store(Request $request)
{
	if($request->skill == config('const.skill.HTML')){
		// 処理
	}

	// insert
    User::create(['skill' => config('const.skill.HTML')]);
}

}
