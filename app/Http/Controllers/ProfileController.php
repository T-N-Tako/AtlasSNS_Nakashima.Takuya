<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profiles.profile');
    }

    // 他ユーザのid
    public function otherProfile($id)
    {
        $user = User::findOrFail($id); // ユーザーを取得

        // 特定のユーザーの投稿のみ取得
        $posts = Post::where('user_id', $id)->get();

        return view('profiles.otherProfile', compact('user', 'posts'));
    }

    // 下書き
    public function edit()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // // バリデーション
        // $request->validate([
        //     'username' => 'required|string|min:2|max:12',  // 2文字以上、12文字以内
        //     'email' => [
        //         'required',
        //         'email',
        //         'min:5',
        //         'max:40',
        //         Rule::unique('users')->ignore(Auth::id()),  // 現在のユーザーを除くメールアドレスの重複チェック
        //     ],
        //     'password' => 'nullable|alpha_num|min:8|max:20|confirmed',  // 英数字のみ、8文字以上、20文字以内、確認欄と一致
        //     'password_confirmation' => 'nullable|alpha_num|min:8|max:20|same:password',  // パスワード確認
        //     'bio' => 'nullable|string|max:150',  // 150文字以内
        //     'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,bmp,svg|max:2048',  // 対応する画像形式
        // ]);

        // まだバリデーション効いてない
        // $request->validate([
        //     'username' => 'required|string|max:255',
        //     'mail' => 'required|email|max:255',
        //     'password' => 'nullable|min:8|max:20|confirmed',
        //     'bio' => 'nullable|string|max:500',
        //     'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);

        // 変更版
        $request->validate([
            'username' => 'required|string|min:2|max:12', // 必須・文字列・2〜12文字
            'email' => [
                'required',
                'email',
                'min:5',
                'max:40',
                Rule::unique('users')->ignore(Auth::id()), // 他のユーザーのメールアドレスと重複不可（自分のはOK）
            ],
            'password' => [
                'required',
                'string',
                'alpha_num', // 英数字のみ
                'min:8',
                'max:20',
                'confirmed', // password_confirmation と一致するか
            ],
            'password_confirmation' => [
                'required',
                'string',
                'alpha_num', // 英数字のみ
                'min:8',
                'max:20',
            ],
            'bio' => 'nullable|string|max:150', // 任意・文字列・最大150文字
            'images' => 'nullable|image|mimes:jpeg,png,bmp,gif,svg|max:2048', // 任意・画像ファイル・指定拡張子のみ・最大2MB
        ], [
            'username.required' => 'ユーザー名は必須項目です',
            'username.min' => 'ユーザー名は２文字以上で入力してください',
            'username.max' => 'ユーザー名は12文字以内で入力してください',

            'email.required' => 'メールアドレスは必須項目です',
            'email.email' => '正しいメールアドレスの形式で入力してください',
            'email.unique' => 'このメールアドレスはすでに登録されています',

            'password.min' => 'パスワードは８文字以上で入力してください',
            'password.max' => 'パスワードは20文字以内で入力してください',
            'password.alpha_num' => 'パスワードは英数字のみ使用できます',
            'password.confirmed' => 'パスワードが一致しません',

            'bio.max' => '自己紹介は150文字以内で入力してください',

            'images.mimes' => 'アップロードできる画像の形式は jpg,png,bmp,gif,svg のみです',
            'images.max' => '画像のサイズは2MB以内でアップロードしてください',

        ]);




        // データ更新
        $user->username = $request->username;
        $user->email = $request->mail;
        $user->bio = $request->bio;

        // パスワードを変更する場合のみ更新
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // $user->bio = $request->bio;

        // 画像の処理
        if ($request->hasFile('image')) {
            // 古い画像がある場合は削除
            if ($user->icon_image) {
                Storage::delete('public/' . $user->icon_image);
            }

            // 新しい画像を保存
            $path = $request->file('image')->store('icons', 'public');
            $user->icon_image = $path;
        }

        $user->save();

        return redirect('index');
    }
}
