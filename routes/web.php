<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {

  // ホーム画面の表示
  Route::get('/index', [PostsController::class, 'index']);

  // プロフィール画面の表示
  Route::get('/profile', [ProfileController::class, 'profile']);

  // 他ユーザーのプロフィール画面の表示
  Route::get('/profile/{id}', [ProfileController::class, 'otherProfile']);

  // プロフィール編集
  Route::post('/update', [ProfileController::class, 'update']);

  // 検索機能
  Route::post('/search', [UsersController::class, 'search']);
  Route::get('/search', [UsersController::class, 'search']);

  // フォロー機能
  Route::post('/toggleFollow/{id}', [FollowsController::class, 'toggleFollow']);

  // フォローリスト表示
  Route::get('/followList', [UsersController::class, 'followList']);

  // フォロワーリスト表示
  Route::get('/followerList', [UsersController::class, 'followerList']);

  // 編集（update）処理
  Route::post('/post/update',  [PostsController::class, 'update']);

  // 削除処理
  Route::get('/post/{id}/delete',  [PostsController::class, 'delete']);

  // 投稿機能
  Route::post('/posts', [PostsController::class, 'store']);

  // ログアウト機能
  Route::get('/logout', [AuthenticatedSessionController::class, 'logout']);
});
