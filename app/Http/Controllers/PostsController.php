<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostsController extends Controller
{
    //
    public function index()
    {
        $posts = Post::get(); //postモデル（postsテーブル）からレコード情報を取得
        return view('posts.index', ['posts' => $posts]);
    }

    // 投稿
    public function store(Request $request)
    {
        // バリデーション（入力必須）
        $request->validate([
            'content' => 'required|max:150',
        ]);

        // 投稿データを保存
        Post::create([
            'content' => $request->content,
            'user_id' => auth()->id(), // ログインユーザーのIDを保存
        ]);

        // 投稿後にリダイレクト
        return redirect();
    }
    // フォローしているユーザーの投稿を表示
    public function show()
    {
        // Postモデル経由でpostsテーブルのレコードを取得
        $posts = Post::get();
        return view('yyyy', compact('posts'));
    }
}
