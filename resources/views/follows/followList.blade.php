<x-login-layout>

  <div class="following-list">
    <h2>フォローリスト</h2>
    @if($following && $following->count() > 0) <!-- フォローしているユーザーが存在するかチェック -->
    @foreach($following as $followed)
    <div class="following-item">
      <a href="{{ url('/profile/' . $followed->id) }}">
        <img src="{{ asset('storage/' . ($followed->icon_image ?? 'images/default-icon.png')) }}" alt="followed icon" width="40" height="40">
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
