<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;



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
        $profileImage = $request->file('image');

        // $id = $user->id;
       // if ($profileImage != null) {
      //      $user->image = $this->saveProfileImage($profileImage); // return file name
      //  }else{
      //      $user->image = 'public/images/sample-image.png';
     // }
       // $user->save();
        return redirect('/login');

    }

    /**image保存
     * 
     */
     /**image保存
     * 
     */
    private function saveProfileImage($profileImage) {
        // get instance
        $img = \Image::make($profileImage);
        // resize
     //   $img->fit(100, 100, function($constraint){
      //      $constraint->upsize(); 
      //  });
        // save
        $file_name = 'profile_'.$profileImage->getClientOriginalExtension();
        $save_path = 'public/images/'.$file_name;
        Storage::put($save_path, (string) $img->encode());
        // return file name
        return $file_name;
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
