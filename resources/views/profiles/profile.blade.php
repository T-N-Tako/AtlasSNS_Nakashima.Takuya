<x-login-layout>


  <!-- 下書き -->
  <div class="container">

    {{-- 現在のアイコン画像 --}}
    <div class="mb-3">
      <label for="images" class="form-label"></label><br>
      <img id="iconPreview" src="{{ Auth::user()->icon_image ? asset('storage/' . Auth::user()->icon_image) : asset('images/default-icon.png') }}" alt="アイコン画像" width="100">
    </div>

    <h2>プロフィール編集</h2>
    <form action="update" method="POST" enctype="multipart/form-data">
      @csrf

      {{-- ユーザー名 --}}
      <div class="mb-3">
        <label for="username" class="form-label">ユーザー名</label>
        <!-- <input type="text" name="username" id="username" class="form-control" value="{{ Auth::user()->username }}" required> -->

        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', Auth::user()->username) }}" required>
        @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

      </div>

      {{-- メールアドレス --}}
      <div class="mb-3">
        <label for="mail" class="form-label">メールアドレス</label>
        <!-- <input type="email" name="mail" id="mail" class="form-control" value="{{ Auth::user()->email }}" required> -->

        <input type="email" name="mail" id="mail" class="form-control @error('mail') is-invalid @enderror" value="{{ old('mail', Auth::user()->email) }}" required>
        @error('mail')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

      </div>

      {{-- パスワード --}}
      <div class="mb-3">
        <label for="password" class="form-label">パスワード</label>
        <!-- <input type="password" name="password" id="password" class="form-control" placeholder="変更しない場合は空のまま"> -->

        <input type="password" name="password" id="password" placeholder="変更しない場合は空のまま">
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- パスワード確認 --}}
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">パスワード確認</label>
        <!-- <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"> -->

        <input type="password" name="password_confirmation" id="password_confirmation">
        @error('password_confirmation')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- 自己紹介 --}}
      <div class="mb-3">
        <label for="bio" class="form-label">自己紹介</label>
        <!-- <textarea name="bio" id="bio" class="form-control">{{ Auth::user()->bio }}</textarea> -->

        <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror">{{ old('bio', Auth::user()->bio) }}</textarea>
        @error('bio')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- 新しいアイコン画像をアップロード --}}
      <div class="mb-3">
        <label for="images" class="form-label">アイコン画像</label>
        <!-- <input type="file" name="image" id="images" class="form-control" accept="image/*" onchange="previewImage(event)"> -->

        <input type="file" name="image" id="images" class="form-control @error('image') is-invalid @enderror" accept="image/*" onchange="previewImage(event)">
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      {{-- 更新ボタン --}}
      <button type="submit" class="btn btn-primary">更新</button>
    </form>
  </div>
  <!--
  <script>
    function previewImage(event) {
      const reader = new FileReader();
      reader.onload = function() {
        const output = document.getElementById('iconPreview');
        output.src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script> -->

  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif


</x-login-layout>
