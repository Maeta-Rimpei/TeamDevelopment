<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class GroupController extends Controller
{
    /**
     * グループ一覧
     */

    public function show()
    {
        $groups = Group::all();
        return view('group.list', ['groups' => $groups]);
    }

    /**
     * グループ作成
     */
}
