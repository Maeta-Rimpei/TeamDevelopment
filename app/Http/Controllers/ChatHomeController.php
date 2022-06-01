<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use App\Models\Group;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
 
class ChatHomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $user = Auth::user();
        $user_id = $user->id;
        //ユーザーが応募したグループオーナーとのチャット
        $user_applications = Applications::where('user_id', $user_id)->where('status','3')->get();
        $user_applications_groups_id = Applications::where('user_id', $user_id)->where('status','3')->select('group_id')->get(); //承認されたユーザーの応募のグループ
        $user_applications_groups = Groups::where('id',$user_application_groups_id)->get();
        $owners_id = $user_application_groups->select('user_id')->get();
        $owners = User::where('id',$to_owners_id)->get();
        $to_owners_chat = [
            $owners,
            $user_applications,
            $user_applications_groups,
        ];



        //ユーザーが作成したグループの応募者とのチャット
        $user_groups = Groups::where('user_id',$user_id)->get();
        $user_groups_id = Groups::where('user_id',$user_id)->select('id')->get();
        $user_gruops_applications = Applications::where('group_id',$user_groups_id)->where('status','3')->get();
        $user_gruops_applications_id = Applications::where('group_id',$user_groups_id)->where('status','3')->select('user_id')->get();
        $clients = User::where('id',$user_gruops_applications_id)->get();
        $to_clients_chat = [
            $clients,
            $user_gruops_applications,
            $user_groups
        ];



 




        // ログイン者以外のユーザを取得する
       // $users = User::where('id' ,'<>' , $user->id)->get();
        // チャットユーザ選択画面を表示
        return view('chat/chat_home' , compact($to_owners_chat,$to_clients_chat));
    }
}