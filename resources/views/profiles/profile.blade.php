<x-login-layout>


  <!-- 下書き -->
  <div class="edit-profile">
    {{-- 現在のアイコン画像 --}}
    <div class="profile-image">
      <!-- <label for="images" class="form-label"></label><br> -->


      @if(Auth::user()->icon_image != 'icon1.png')
      <!-- ユーザーが設定したアイコンを表示 -->
      <img src="{{ asset('storage/icons/' . Auth::user()->icon_image) }}" alt="User Icon" id="icon" width="50">
      @else
      <!-- 初期アイコンを表示 -->
      <img src="{{ asset('images/icon1.png') }}" alt="User Icon" id="icon" width="50">
      @endif

      <!-- <img id="iconPreview" src="{{ Auth::user()->icon_image ? asset('storage/' . Auth::user()->icon_image) : asset('images/default-icon.png') }}" alt="アイコン画像" style="width: 50px; height: 50px;"> -->
    </div>

    <div class="form-container">
      <form action="update" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- ユーザー名 --}}
        <div class="form-group">
          <label for="username" class="form-label">ユーザー名</label>
          <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', Auth::user()->username) }}" required>
          @error('username')
          <div class="invalid-feedback  d-block">{{ $message }}</div>
          @enderror
        </div>

        {{-- メールアドレス --}}
        <div class="form-group">
          <label for="email" class="form-label">メールアドレス</label>
          <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', Auth::user()->email) }}">
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror

        </div>

        {{-- パスワード --}}
        <div class="form-group">
          <label for="password" class="form-label">パスワード</label>
          <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
          @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- パスワード確認 --}}
        <div class="form-group">
          <label for="password_confirmation" class="form-label">パスワード確認</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
          @error('password_confirmation')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- 自己紹介 --}}
        <div class="form-group">
          <label for="bio" class="form-label">自己紹介</label>
          <!-- <input type="text" name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror">{{ old('bio', Auth::user()->bio) }}</input> -->

          <input type="text" name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" value="{{ old('bio', Auth::user()->bio) }}">

          @error('bio')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- 新しいアイコン画像をアップロード --}}
        <div class="form-group">
          <div for="icon">アイコン画像</div>

          <div class="custom-file">
            <label for="images" class="custom-file-label">ファイルを選択</label>
            <input type="file" name="image" id="images" class="custom-file-input @error('image') is-invalid @enderror" accept="image/*" onchange="previewImage(event)">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        {{-- 更新ボタン --}}
        <button type="submit" class="btn btn-danger">更新</button>
      </form>
    </div>
  </div>

</x-login-layout>
