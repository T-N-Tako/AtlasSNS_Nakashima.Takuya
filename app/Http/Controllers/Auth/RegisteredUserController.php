<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function register(Request $request): RedirectResponse
    {
        // バリデーションルール
        $request->validate([
            'username' => 'required|string|min:2|max:12',
            'email' => 'required|string|email|min:5|max:40|unique:users,email',
            'password' => 'required|string|min:8|max:20|regex:/^[a-zA-Z0-9]+$/|confirmed',
        ], [
            'username.required' => 'ユーザー名は必須項目です',
            'username.min' => 'ユーザー名は２文字以上で入力してください',
            'username.max' => 'ユーザー名は12文字以内で入力してください',

            'email.required' => 'メールアドレスは必須項目です',
            'email.email' => '正しいメールアドレスの形式で入力してください',
            'email.unique' => 'このメールアドレスはすでに登録されています',

            'password.required' => 'パスワードは必須項目です',
            'password.min' => 'パスワードは８文字以上で入力してください',
            'password.max' => 'パスワードは20文字以内で入力してください',
            'password.regex' => 'パスワードは英数字のみ使用できます',
            'password.confirmed' => 'パスワードが一致しません',
        ]);

        // ユーザーを作成
        $user = User::create([
            // 'username' => $request['username'],
            // 'email' => $request['email'],
            // 'password' => Hash::make($request['password']),
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);



        //     // セッションに登録ユーザーの名前を保存
        session()->flash('user_name', $user->username);
        // セッションに登録ユーザーの名前を保存
        // Session::flash('user_name', $user->username);

        return redirect('added');
    }

    public function added(): View
    {
        return view('auth.added');
    }


    // public function store(Request $request): RedirectResponse
    // {
    //     $user = User::create([
    //         'username' => $request->username,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     // セッションに登録ユーザーの名前を保存
    //     session()->flash('user_name', $user->username);

    //     return redirect('added');
    // }

    // public function added(): View
    // {
    //     return view('auth.added');
    // }


    // public function register(Request $request)
    // {
    //     // バリデーションルール
    //     $request->validate([
    //         'username' => 'required|string|min:2|max:12',
    //         'email' => 'required|string|email|min:5|max:40|unique:users,email',
    //         'password' => 'required|string|min:8|max:20|regex:/^[a-zA-Z0-9]+$/|confirmed',
    //     ], [
    //         'username.required' => 'ユーザー名は必須項目です',
    //         'username.min' => 'ユーザー名は２文字以上で入力してください',
    //         'username.max' => 'ユーザー名は12文字以内で入力してください',

    //         'email.required' => 'メールアドレスは必須項目です',
    //         'email.email' => '正しいメールアドレスの形式で入力してください',
    //         'email.unique' => 'このメールアドレスはすでに登録されています',

    //         'password.required' => 'パスワードは必須項目です',
    //         'password.min' => 'パスワードは８文字以上で入力してください',
    //         'password.max' => 'パスワードは20文字以内で入力してください',
    //         'password.alpha_num' => 'パスワードは英数字のみ使用できます',
    //         'password.confirmed' => 'パスワードが一致しません',
    //         'password_confirmation.required' => 'パスワードは必須項目です',
    //     ]);

    //     // // ユーザーを作成
    //     // $user = User::create([
    //     //     'username' => $validated['username'],
    //     //     'email' => $validated['email'],
    //     //     'password' => bcrypt($validated['password']),
    //     // ]);

    //     return redirect('/login')->with('success', '新規登録が完了しました！');
    // }
}
