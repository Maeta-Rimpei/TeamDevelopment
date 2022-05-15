<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use PHPUnit\TextUI\XmlConfiguration\Groups;

class ApplicationController extends Controller
{
    /**
     * 応募一覧
     * @return view
     */
    public function appShow()
    {

    }
}


