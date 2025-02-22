<x-login-layout>

  <!-- 下書き -->
  @section('content')
  <div class="container">
    <h2>プロフィール編集</h2>
    <form action="update" method="POST" enctype="multipart/form-data">
      @csrf

      {{-- ユーザー名 --}}
      <div class="mb-3">
        <label for="username" class="form-label">ユーザー名</label>
        <input type="text" name="username" id="username" class="form-control" value="{{ Auth::user()->username }}" required>
      </div>

      {{-- メールアドレス --}}
      <div class="mb-3">
        <label for="mail" class="form-label">メールアドレス</label>
        <input type="email" name="mail" id="mail" class="form-control" value="{{ Auth::user()->email }}" required>
      </div>

      {{-- パスワード --}}
      <div class="mb-3">
        <label for="password" class="form-label">パスワード</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="変更しない場合は空のまま">
      </div>

      {{-- パスワード確認 --}}
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">パスワード確認</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
      </div>

      {{-- 自己紹介 --}}
      <div class="mb-3">
        <label for="bio" class="form-label">自己紹介</label>
        <textarea name="bio" id="bio" class="form-control">{{ Auth::user()->bio }}</textarea>
      </div>

      {{-- アイコン画像 --}}
      <div class="mb-3">
        <label for="images" class="form-label">アイコン画像</label>
        <input type="file" name="images" id="images" class="form-control">
      </div>

      {{-- 更新ボタン --}}
      <button type="submit" class="btn btn-primary">更新</button>
    </form>
  </div>

</x-login-layout>
