<x-login-layout>

  <div class="follower-list">
    <h2>フォロワーリスト</h2>
    @if($followers && $followers->count() > 0) <!-- フォロワーが存在するかチェック -->
    @foreach($followers as $follower)
    <div class="follower-item">
      <a href="{{ url('/profile/' . $follower->id) }}">
        <img src="{{ asset('storage/' . ($follower->icon_image ?? 'images/default-icon.png')) }}" alt="follower icon" width="40" height="40">
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
              <img src="{{ asset('storage/' . ($post->user->icon_image ?? 'images/default-icon.png')) }}" alt="user icon" width="40" height="40">
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
