<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
class EditProfileController extends Controller
{
    /**
     * プロフィール編集画面表示
     * @param
     * @return View プロフィール編集画面
     */
    public function show()
    {
        $user = Auth::user();
        return view('editprofile', ['user' => $user]);
    }

    /**
     * プロフィール編集
     * @param Request
     * @return Response
     */

    protected function profileUpdate(Request $request)
    {
        $request->validate([
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'max:255'], 
             'sex'      => ['required'],
            // 'skill' =>['integer'],
             'experience_year' =>['required', 'integer'],
             'birthday'=>['required'],
             'github' =>['required','string'],
             'image' =>['image'],
        ]);
       // $image=request()->file('image')->getClientOriginalName();
       // dd($image);
       // request()->file('image')->storeAs('public/images', $image);
        try {
           // dd($request->all());
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->sex = $request->input('sex');
            $new_skills = $request->input('skill');
            $user->skill = implode(',',$new_skills);
            $user->experience_year = $request->input('experience_year');
            $user->birthday = $request->input('birthday');
            $user->github = $request->input('github');
           // $user->image = $request->input('image');
           $profileImage = $request->file('image');
           $id = $user->id;
            if ($profileImage != null) {
                $user->image = $this->saveProfileImage($profileImage, $id); // return file name
            }else{
                $user->image = 'public/images/sample-image.png';
            }
         //  $user->image = $profileImage;

        // dd($user->image);


         //   $user->save();

        } catch (\Exception $e) {
            return back()->with('msg_error', 'プロフィールの更新に失敗しました')->withInput();
        }
        $user->save();
        return redirect('/home')->with('status', 'プロフィールを変更しました');;
    }
    /**image保存
     * 
     */
    private function saveProfileImage($profileImage, $id) {
        // get instance
        $img = \Image::make($profileImage);
        // resize
      //  $img->fit(100, 100, function($constraint){
       //     $constraint->upsize(); 
       // });
        // save
        $file_name = 'profile_'.$id.'.'.$profileImage->getClientOriginalExtension();
        $save_path = 'public/images/'.$file_name;
        Storage::put($save_path, (string) $img->encode());
        // return file name
        return $file_name;
    }

    /**退会警告画面表示 
     * 
    */
    public function delete_confirm(){
        return view('delete_confirm');
    }

     
     /**退会機能
      * 
      */
      public function delete()
      {
        $user = Auth::user();
        $user->delete();
        Auth::logout();
        return redirect('/');
      }

}
