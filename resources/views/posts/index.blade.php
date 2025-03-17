<x-login-layout>

  <div id="post-content">
    <div id="post">
      <form action="/posts" method="POST" id="posts-area">
        @csrf

        @if(Auth::user()->icon_image != 'icon1.png')
        <!-- ユーザーが設定したアイコンを表示 -->
        <img src="{{ asset('storage/icons/' . Auth::user()->icon_image) }}" alt="User Icon" id="icon" width="50">
        @else
        <!-- 初期アイコンを表示 -->
        <img src="{{ asset('images/icon1.png') }}" alt="User Icon" id="icon" width="50">
        @endif



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

              @if($post->user->icon_image != 'icon1.png')
              <!-- ユーザーが設定したアイコンを表示 -->
              <img src="{{ asset('storage/icons/' . $post->user->icon_image) }}" alt="User Icon" width="40" height="40">
              @else
              <!-- 初期アイコンを表示 -->
              <img src="{{ asset('images/icon1.png')}}" alt="User Icon" width="40" height="40">
              @endif

              <span>{{ $post->user->username }}</span>
              {{ $post->created_at->format('Y-m-d H:i')}}
            </div>
            <div class="post-content">{!! nl2br(e($post->post)) !!}</div>
            @if (Auth::user()->id == $post->user_id)
            <div class="post-actions">

              <a class=" js-modal-open edit-button" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"> <img src="{{ asset('images/edit.png') }}"></a>

              <a href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')" onmouseover="this.querySelector('img').src='{{ asset('images/trash-h.png') }}' "
                onmouseout="this.querySelector('img').src='{{ asset('images/trash.png') }}' "><img src="{{ asset('images/trash.png') }}"></a>
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
