<x-login-layout>

  <div id="post-content">
    <div id="post">
      <form action="/posts" method="POST" id="posts-area">
        @csrf
        <img src="{{asset('storage/' . Auth::user()->icon_image)}}" alt="User Icon" id="icon" width="50">
        <textarea name="content" placeholder="投稿内容を入力してください。" id="post-textarea"></textarea>
        <input type="image" src="{{ asset('images/post.png') }}" alt="post Icon" id="post-button">
      </form>
    </div>

    <div id="posts-list">
      <table>
        @foreach ($posts as $post)
        <tr id="confirm">
          <td class="post-info">
            <div class="post-header">
              <img src="{{ asset('storage/' . ($post->user->icon_image ?? 'images/default-icon.png')) }}" alt="user icon" width="40" height="40">
              <span>{{ $post->user->username }}</span>
              {{ $post->created_at }}
            </div>
            <div class="post-content">{{ $post->post }}</div>
            @if (Auth::user()->id == $post->user_id)
            <div class="post-actions">

              <a class=" js-modal-open edit-button" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"> <img src="{{ asset('images/edit.png') }}"></a>

              <a href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')" onmouseover="this.querySelector('img').src='{{ asset('images/trash-h.png') }}' "
                onmouseout="this.querySelector('img').src='{{ asset('images/trash.png') }}' "><img src="{{ asset('images/trash-h.png') }}"></a>
            </div>
            @endif
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>


  <!-- モーダルの中身 -->
  <div class="modal js-modal">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">
      <form action="/post/update" method="POST">
        @csrf
        <textarea name="content" class="modal_post"></textarea>
        <input type="hidden" name="id" class="modal_id" value="{{ $post->id }}">
        <input type="image" src="{{ asset('images/edit.png') }}" class="edit-icon">
        {{ csrf_field() }}
      </form>
    </div>
  </div>

</x-login-layout>
