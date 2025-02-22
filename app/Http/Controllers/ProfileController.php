<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profiles.profile');
    }



    // 下書き
    public function edit()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // バリデーション
        $request->validate([
            'username' => 'required|string|max:255',
            'mail' => 'required|email|max:255',
            'password' => 'nullable|min:8|confirmed',
            'bio' => 'nullable|string|max:500',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // データ更新
        $user->username = $request->username;
        $user->email = $request->mail;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->bio = $request->bio;

        // アイコン画像のアップロード処理
        if ($request->hasFile('images')) {
            $path = $request->file('images')->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        $user->save();

        return redirect('index');
    }
}
