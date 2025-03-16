<x-login-layout>

  <div class="follower-list">
    <h2>フォロワーリスト</h2>
    @if($followers && $followers->count() > 0) <!-- フォロワーが存在するかチェック -->
    @foreach($followers as $follower)
    <div class="follower-item">
      <a href="{{ url('/profile/' . $follower->id) }}">

        @if($follower->icon_image != 'icon1.png')
        <!-- ユーザーが設定したアイコンを表示 -->
        <img src="{{ asset('storage/' . $follower->icon_image) }}" alt="follower icon" width="40" height="40">
        @else
        <!-- 初期アイコンを表示 -->
        <img src="{{ asset('images/icon1.png') }}" alt="follower icon" width="40" height="40">
        @endif

      </a>
    </div>
    @endforeach
    @else
    <div>
      <p colspan="2">フォロワーはまだいません。</p>
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
              <img src="{{ asset('storage/' . $post->user->icon_image) }}" alt="User Icon" width="40" height="40">
              @else
              <!-- 初期アイコンを表示 -->
              <img src="{{ asset('images/icon1.png')}}" alt="User Icon" width="40" height="40">
              @endif
              <!-- <img src="{{ asset('storage/' . ($post->user->icon_image ?? 'images/default-icon.png')) }}" alt="user icon" width="40" height="40"> -->
            </a>
            <span>{{ $post->user->username }}</span>
            {{ $post->created_at }}
          </div>
          <div class="post-content">{{ $post->post }}</div>
        </td>
      </tr>
      @endforeach
    </table>
  </div>

</x-login-layout>
