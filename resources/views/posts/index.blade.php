<x-login-layout>


  <div class="container">
    <main>
      <div class="post-form">
        <form action="/posts" method="POST">
          <button> <img src="{{ asset('images/post.png') }}" alt="post Icon" class="post-icon"></button>
          <textarea name="content" placeholder="投稿内容を入力してください。"></textarea>
        </form>
      </div>

      <div class="post">
        <div class="post-header">
          <img src="images/icon1.png" alt="User Icon" class="user-icon">
          <span class="username">admin</span>
          <span class="timestamp">2021-03-01 15:00</span>
        </div>
        <p>自分が投稿した内容を表示します。投稿は最大150文字までとし、それ以上のテキストが入らないようにします。</p>
        <p>トップでは自分がフォローしている人の投稿も見ることができるようにします。</p>
        <div class="post-actions">
          <img src="images/edit_h.png" alt="User Icon" class="user-icon">
          <img src="images/trash-h.png" alt="User Icon" class="user-icon">
        </div>
      </div>



      <table class="table table-hover">

        @foreach ($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td>{{ $post->post }}</td>
          <td>{{ $post->created_at }}</td>
          <!-- ↓ここを追加してください -->
          <td><a class="btn btn-primary" href="/post/{{$post->id}}/update-form">更新</a></td>
          <!-- ↓ここを追加してください -->
          <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">削除</a></td>
        </tr>
        @endforeach
      </table>


      <!-- 以下のソースは例なので、自分の場合に当てはめて適宜補填しながら進めていきましょう -->
      @foreach($posts as $value)
      …..
      <div class="content">
        <!-- 投稿の編集ボタン -->
        <a class="js-modal-open" href="" post="{{ $value->post }}" post_id="{{ $value->id }}">編集</a>
      </div>
      ….
      @endforeach
      <!-- モーダルの中身 -->
      <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
          <form action="" method="">
            <textarea name="" class="modal_post"></textarea>
            <input type="hidden" name="" class="modal_id" value="">
            <input type="submit" value="更新">
            {{ csrf_field() }}
          </form>
          <a class="js-modal-close" href="top">閉じる</a>
        </div>
      </div>
    </main>
  </div>



</x-login-layout>
