<x-logout-layout>


  <div class="container">
    <!-- 適切なURLを入力してください -->
    {!! Form::open(['url' => 'login']) !!}

    <h2>AtlasSNSへようこそ</h2>

    {{ Form::label('メールアドレス') }}
    {{ Form::text('email',null,['class' => 'input']) }}
    {{ Form::label('パスワード') }}
    {{ Form::password('password',['class' => 'input']) }}

    {{ Form::submit('ログイン', ['class' => 'btn']) }}

    <p><a href="/register">新規ユーザーの方はこちら</a></p>

    {!! Form::close() !!}
  </div>

</x-logout-layout>
