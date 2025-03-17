<!-- 自分で作成したblad -->

<x-login-layout>

  <div class="profile-info">
    <img src="{{ asset('storage/icons/' . ($user->icon_image ?? 'images/default-icon.png')) }}" alt="follower icon" width="50" height="50">
    <div class="profile-details">
      <div class="username-wrapper">
        <p>ユーザー名 </p>
        <p class="profile-username">{{ $user->username }}</p>
      </div>
      <div>
        <p>自己紹介 </p>
        <p class="profile-bio">{{ $user->bio }}</p>
      </div>
    </div>
    @if ($user->id !== auth()->id()) <!-- 自分自身にはフォローボタンを表示しない -->
    <div class="follow-button-wrapper">
      @if (auth()->user()->isFollowing($user->id))
      <form action="/toggleFollow/{{$user->id}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">フォロー解除</button>
      </form>
      @else
      <form action="/toggleFollow/{{$user->id}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">フォローする</button>
      </form>
      @endif
    </div>
    @endif
  </div>


  <div id="posts-list">
    <table>
      @foreach($posts as $post)
      <tr>
        <td class="post-info">
          <div class="post-header">
            <img src="{{ asset('storage/' . ($post->user->icon_image ?? 'images/default-icon.png')) }}" alt="user icon" width="40" height="40">
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
