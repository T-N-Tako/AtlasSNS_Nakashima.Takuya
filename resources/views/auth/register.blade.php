<x-logout-layout>
    <!-- 適切なURLを入力してください -->
    <div class="container">
        {!! Form::open(['url' => 'register', 'method' => 'POST']) !!}
        @csrf
        <h2>新規ユーザー登録</h2>

        {{ Form::label('ユーザー名') }}
        {{ Form::text('username',old('username'),['class' => 'input', 'required']) }}
        @error('username')
        <div class="error">{{ $message }}</div>
        @enderror

        {{ Form::label('メールアドレス') }}
        {{ Form::text('email',old('email'),['class' => 'input', 'required']) }}
        @error('email')
        <div class="error">{{ $message }}</div>
        @enderror

        {{ Form::label('パスワード') }}
        {{ Form::password('password',['class' => 'input', 'required']) }}
        @error('password')
        <div class="error">{{ $message }}</div>
        @enderror

        {{ Form::label('パスワード確認') }}
        {{ Form::password('password_confirmation',['class' => 'input', 'required']) }}
        @error('password_confirmation')
        <div class="error">{{ $message }}</div>
        @enderror

        {{ Form::submit('新規登録', ['class' => 'btn']) }}

        <p><a href="/login">ログイン画面へ戻る</a></p>

        {!! Form::close() !!}
    </div>

</x-logout-layout>
