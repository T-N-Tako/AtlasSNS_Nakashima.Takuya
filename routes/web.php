<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FollowController;
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

// ホーム画面の表示
Route::get('index', [PostsController::class, 'index']);

Route::get('profile', [ProfileController::class, 'profile']);

Route::get('search', [UsersController::class, 'search']);

Route::get('follow-list', [PostsController::class, 'index']);

Route::get('follower-list', [PostsController::class, 'index']);

Route::post('/follow/{id}', [FollowController::class, 'toggleFollow']);

Route::get('followList', [UsersController::class, 'followList']);

Route::get('followerList', [UsersController::class, 'followerList']);

Route::get('post', [PostController::class, 'index']);
// 投稿機能のはず
Route::post('/posts', [PostController::class, 'store']);
// ログアウト機能
Route::get('logout', [AuthenticatedSessionController::class, 'logout']);
