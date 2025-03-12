<x-logout-layout>
    <!-- 適切なURLを入力してください -->
    <div class="container">
        {!! Form::open(['url' => 'register']) !!}
        @csrf
        <h2>新規ユーザー登録</h2>

        {{ Form::label('ユーザー名') }}
        {{ Form::text('username',null,['class' => 'input']) }}

        {{ Form::label('メールアドレス') }}
        {{ Form::text('email',null,['class' => 'input']) }}

        {{ Form::label('パスワード') }}
        {{ Form::password('password',null,['class' => 'input']) }}

        {{ Form::label('パスワード確認') }}
        {{ Form::password('password_confirmation',null,['class' => 'input']) }}

        {{ Form::submit('新規登録', ['class' => 'btn']) }}

        <p><a href="/login">ログイン画面へ戻る</a></p>

        {!! Form::close() !!}
    </div>

</x-logout-layout>
