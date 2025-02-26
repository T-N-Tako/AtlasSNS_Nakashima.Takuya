<x-login-layout>


  <div class="container">
    <main>
      <div class="post-form">
        <form action="/posts" method="POST">
          @csrf
          <textarea name="content" placeholder="投稿内容を入力してください。"></textarea>
          <button> <img src="{{ asset('images/post.png') }}" alt="post Icon" class="post-icon"></button>
        </form>
      </div>


      <table class="table table-hover">
        @foreach ($posts as $post)
        <tr>
          <td>
            <img src="{{ asset('storage/' . ($post->user->icon_image ?? 'images/default-icon.png')) }}" alt="user icon" width="40" height="40" ">
          </td>
          <td>{{ $post->user->username }}</td>
          <td>{{ $post->post }}</td>
          <td>{{ $post->created_at }}</td>
          @if (Auth::user()->id == $post->user_id)
          <td><a class=" js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"> <img src="{{ asset('images/edit_h.png') }}"></a>
          </td>
          <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="{{ asset('images/trash-h.png') }}"></a></td>
          @endif
        </tr>
        @endforeach
      </table>


      <!-- 以下のソースは例なので、自分の場合に当てはめて適宜補填しながら進めていきましょう -->

      <!-- モーダルの中身 -->
      <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
          <form action="/post/update" method="POST">
            @csrf
            <textarea name="upPosts" class="modal_post"></textarea>
            <input type="hidden" name="id" class="modal_id" value="{{ $post->id }}">
            <input type="submit" value="更新">
            {{ csrf_field() }}
          </form>
          <a class="js-modal-close" href="top">閉じる</a>
        </div>
      </div>
    </main>
  </div>



</x-login-layout>
