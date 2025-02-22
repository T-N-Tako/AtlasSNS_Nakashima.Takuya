<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class FollowsController extends Controller
{
    //
    // public function followList()
    // {
    //     return view('follows.followList');
    // }
    // public function followerList()
    // {
    //     return view('follows.followerList');
    // }


    // フォローまたはフォロー解除の処理
    public function toggleFollow($id)
    {
        $user = auth()->user(); // 現在のログインユーザー

        // フォロー対象のユーザー
        $userToFollow = User::findOrFail($id);

        // すでにフォローしているかチェック
        $isFollowing = $user->isfollowing($id);

        if ($isFollowing) {
            $user->following()->detach($id); // フォロー解除
        } else {
            $user->following()->attach($id); // フォロー追加
        }

        return back();
    }
}
