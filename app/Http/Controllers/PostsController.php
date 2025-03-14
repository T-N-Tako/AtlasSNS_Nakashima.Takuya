<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostsController extends Controller
{
    //
    public function index()
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();

        // 1件目の投稿内容をデバッグ表示
        // dd($posts->first()->post);


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
            'post' => $request->content,
            'user_id' => auth()->id(), // ログインユーザーのIDを保存
        ]);

        // 投稿後にリダイレクト
        return redirect('/index');
    }

    // 編集
    public function update(Request $request)
    {
        // 1. バリデーション（空の値を許さない）
        $request->validate([
            'content' => 'required|max:150',
        ]);

        // 2. 該当の投稿を取得し、更新
        Post::where('id', $request->id)->update([
            'post' => $request->content,
        ]);

        // 3. 更新後にリダイレクト
        return redirect('/index');
    }

    // 削除
    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/index');
    }

    // 投稿の表示
    public function show()
    {
        // Postモデル経由でpostsテーブルのレコードを取得
        $posts = Post::with('user')->latest()->get();
        return view('followList', compact('posts'));
    }
}
