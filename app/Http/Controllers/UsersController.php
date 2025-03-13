<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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
            $users = User::where('id', '!=', auth()->id())->get(); // 自分以外の全ユーザーを取得
        }
        // 3つ目の処理
        return view('users.search', ['users' => $users]);
    }

    // 初期
    // public function followList()
    // {
    //     $posts = Post::get();
    //     return view('follows.followList', compact('posts'));
    // }
    // public function followerList()
    // {
    //     $posts = Post::get();
    //     return view('follows.followerList', compact('posts'));
    // }

    // 変化後
    public function followList()
    {
        // フォローしているユーザーのidを取得
        $following_id = Auth::user()->following()->pluck('followed_id');

        // フォローしているユーザーのユーザー情報を取得
        $following = User::whereIn('id', $following_id)->get();

        // フォローしているユーザーのidを元に投稿内容を取得
        $posts = Post::with('user')->whereIn('user_id', $following_id)->orderBy('created_at', 'desc')->with('user')->get();

        return view('follows.followList', compact('posts', 'following'));
    }

    public function followerList()
    {
        // フォローしてくれているユーザーのidを取得
        $follower_id = Auth::user()->followed()->pluck('following_id');

        // フォロワーのユーザー情報を取得
        $followers = User::whereIn('id', $follower_id)->get();

        // フォローしてくれているユーザーのidを元に投稿内容を取得
        $posts = Post::with('user')->whereIn('user_id', $follower_id)->orderBy('created_at', 'desc')->with('user')->get();
        return view('follows.followerList', compact('posts', 'followers'));
    }
}
