<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    /**
     * グループ一覧
     * @return view
     */
    public function show()
    {
        $groups = Group::all();
        return view('group.list', ['groups' => $groups]);
    }

    /**
     * グループ詳細画面
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $group = Group::find($id);
        // $idが空だった場合、一覧画面にリダイレクト
        if (is_null($id)){
            \session::flash('err_msg', '選択されたグループは存在しません。');
            return redirect(route(group.show));
        }
        return view('group.detail', ['group' => $group]);
    }

    /**
     * グループ作成
     * @return view
     */
    public function showCreate()
    {
        return view('group.form');
    }
}
