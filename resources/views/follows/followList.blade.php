<x-login-layout>

  <div class="following-list">
    <h2>フォローリスト</h2>
    @if($following && $following->count() > 0) <!-- フォローしているユーザーが存在するかチェック -->
    @foreach($following as $followed)
    <div class="following-item">
      <a href="{{ url('/profile/' . $followed->id) }}">

        @if($followed->icon_image != 'icon1.png')
        <!-- ユーザーが設定したアイコンを表示 -->
        <img src="{{ asset('storage/icons/' . $followed->icon_image) }}" alt="followed icon" width="40" height="40">
        @else
        <!-- 初期アイコンを表示 -->
        <img src="{{ asset('images/icon1.png') }}" alt="followed icon" width="40" height="40">
        @endif

      </a>
    </div>
    @endforeach
    @else
    <div>
      <p colspan="2">フォローしているユーザーはまだいません。</p>
    </div>
    @endif
  </div>

  <div id="posts-list">
    <table>
      @foreach($posts as $post)
      <tr>
        <td class="post-info">
          <div class="post-header">
            <a href="{{ url('/profile/' . $post->user_id) }}">

              @if($post->user->icon_image != 'icon1.png')
              <!-- ユーザーが設定したアイコンを表示 -->
              <img src="{{ asset('storage/icons/' . $post->user->icon_image) }}" alt="User Icon" width="40" height="40">
              @else
              <!-- 初期アイコンを表示 -->
              <img src="{{ asset('images/icon1.png')}}" alt="User Icon" width="40" height="40">
              @endif

              <!-- <img src="{{ asset('storage/' . ($post->user->icon_image ?? 'images/default-icon.png')) }}" alt="user icon" width="40" height="40"> -->
            </a>
            <span>{{ $post->user->username }}</span>
            {{ $post->created_at->format('Y-m-d H:i')}}
          </div>
          <div class="post-content">{!! nl2br(e($post->post)) !!}</div>
        </td>
      </tr>
      @endforeach
    </table>
  </div>

</x-login-layout>
