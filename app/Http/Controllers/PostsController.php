<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user(); // 現在のログインユーザー

        // フォローしているユーザーの ID を取得
        $followingIds = $user->following()->pluck('users.id');

        // 自分の投稿とフォローしている人の投稿のみ取得
        $posts = Post::whereIn('user_id', $followingIds) // フォローしている人の投稿
            ->orWhere('user_id', $user->id) // 自分の投稿
            ->orderBy('created_at', 'desc') // 新しい順に並べる
            ->get();

        // $posts = Post::with('user')->orderBy('created_at', 'desc')->get();

        return view('posts.index', ['posts' => $posts]);
    }

    // 投稿
    public function store(Request $request)
    {
        // バリデーション（入力必須）
        $request->validate([
            'content' => 'required|string|min:1|max:150',
        ], [
            'content.required' => '投稿内容を入力してください。',
            'content.min' => '投稿内容は1文字以上入力してください。',
            'content.max' => '投稿内容は150文字以内で入力してください。',
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
        ], [
            'content.required' => '投稿内容を入力してください。',
            'content.max' => '投稿内容は150文字以内で入力してください。',
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
