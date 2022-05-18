<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * パスワード編集ページ
     * @param
     * @return Redirect 一覧ページ-メッセージ（パスワード更新完了）
     */
    public function editpassword()
    {
        return view('passwordform')
        ->with('user', \Auth::user());
    }

    /**
     *パスワード変更機能
     */

    protected function validator(array $data){

         return Validator::make($data,[
            'new_password' => 'required|string|min:8|confirmed',
            ]);
    }

    public function changepassword(Request $request){

        // ID のチェック
            if ($request->id != \Auth::user()->id) {
            return redirect('/home')
                ->with('warning', '致命的なエラーです');
            }
            $user = \Auth::user();
      // 現在のパスワードを確認
        if (!password_verify($request->current_password, $user->password)) {
        return redirect('/password/change')
                ->with('warning', 'パスワードが違います');
      }
      // Validation（6文字以上あるか，2つが一致しているかなどのチェック）
        $this->validator($request->all())->validate();
      // パスワードを保存
        $user->password = bcrypt($request->new_password);
        $user->save();
        return redirect('/home')
              ->with('status', 'パスワードを変更しました');
    }
}
