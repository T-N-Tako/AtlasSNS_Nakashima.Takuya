<x-logout-layout>

  <div class="added-container">
    <ul>
      <li class="added-username">{{ session('user_name') }}さん</li>
      <li class="added-welcome">ようこそ！AtlasSNSへ</li>
      <li>ユーザー登録が完了しました。</li>
      <li class="login-go">早速ログインをしてみましょう!</li>
      <li><a href="/login" class="login-link">ログイン画面へ</a></li>
    </ul>
  </div>

</x-logout-layout>
