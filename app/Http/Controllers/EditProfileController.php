<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

    public function profileUpdate(Request $request){
        $this->validate($request, [
            'name' => 'required|max:15',
            'phone' => 'numeric|digits_between:1,15',
            'email' => 'email|max:254',
            'sex' => 'numeric',
            'birthday' => 'numeric',
            'skill' => 'numeric',
            'experience_year' => 'numeric',
            'github' => 'string',
            'image' => 'string',
        ]);

        $user = Auth::user();

        $new_name = $request->name;
        $new_phone = $request->phone;
        $new_email = $request->email;
        $new_sex = $request->sex;
        $new_birthday = $request->birthday;
        $new_skill = $request->request;
        $new_experience_year = $request->experience_year;
        $new_github = $request->github;
        $new_image = $request->image;

        $user->name = $new_name;
        $user->phone = $new_phone;
        $user->email = $new_email;
        $user->sex = $new_sex;
        $user->birthday = $new_birthday;
        $user->skill = $new_skill;
        $user->experience_year = $new_experience_year;
        $user->github = $new_github;
        $user->image = $new_image;

        $user->save();

        return redirect('/home');
     }
     
     /**退会機能
      * 
      */
      public function destroy($id)
      {
          $user = User::find($id);
          $user->delete();
          return redirect('/');
      }
    /**
     * 退会確認ページ
     */
      public function delete_confirm()
    {
        return view('delete_confirm');
    }



    /**
     * パスワード編集ページ
     * @param
     * @return Redirect 一覧ページ-メッセージ（パスワード更新完了）
     */
    public function editpassword()
    {
        return view('passwordform');
    }

    /**
     *パスワード変更機能
     */

    protected function validator(array $data)
    {
        return Validator::make($data,[
            'new_password' => 'required|string|min:6|confirmed',
            ]);
    }

    public function changepassword(Request $request){

        $user = \Auth::user();
        if(!password_verify($request->current_password,$user->password))
        {
            return redirect('/password/change')
                ->with('warning','パスワードが違います');
        }

        //新規パスワードの確認
        $this->validator($request->all())->validate();

        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect ('/')
            ->with('status','パスワードの変更が終了しました');
    }


}
