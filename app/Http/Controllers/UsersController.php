<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{
    // //
    // public function search()
    // {
    //     return view('users.search');
    // }

    public function index()
    {
        $users = User::get(); //userモデル（usersテーブル）からレコード情報を取得
        return view('users.index', ['users' => $users]);
    }

    // 検索機能の実装から拝借
    public function search(Request $request)
    {
        // 1つ目の処理
        $keyword = $request->input('keyword');
        // 2つ目の処理
        if (!empty($keyword)) {
            $users = User::where('username', 'like', '%' . $keyword . '%')->get();
        } else {
            $users = User::all();
        }
        // 3つ目の処理
        return view('users.search', ['users' => $users]);
    }


    public function followList()
    {
        return view('follows.followList');
    }
    public function followerList()
    {
        return view('follows.followerList');
    }
}
