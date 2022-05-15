<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GroupRequest;
use App\Models\Group;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class GroupController extends Controller
{
    /**
     * グループ一覧
     * @return view
     */
    public function groupShow()
    {
        // グループデータを降順で取得
        $groups = Group::orderBy('updated_at', 'desc')->get();

        return view('group.group_list', compact('groups'));
    }

    /**
     * グループ詳細画面/応募一覧画面
     * @param int $id
     * @return view
     */
    public function groupShowDetail($id)
    {
        $group = Group::find($id);
        $users = $group->user;
        // $idが空だった場合、一覧画面にリダイレクト
        if (is_null($id)) {
            \Session::flash('err_msg', '選択されたグループは存在しません。');
            return redirect(route(group . groupShow));
        }

        return view('group.group_detail', compact('group', 'users'));
    }

    /**
     * グループ作成画面
     * @return view
     */
    public function groupShowCreate()
    {
        // ログインuser情報を変数に格納

        // グループ作成フォームの表示
        // viewにuser情報を渡す予定
        return view('group.group_form');
    }

    /**
     * グループ作成
     * @return view
     */
    public function groupExeCreate(GroupRequest $request)
    {
        // 作成するグループの情報を取得
        $input = $request->all();
        // トランザクション処理
        \DB::beginTransaction();
        // 例外処理
        try {
            // グループ作成
            Group::create($input);
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
        }
        return redirect(route('groupShow'));
    }
}
