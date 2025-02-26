<x-login-layout>

  <h2>フォロワーリスト</h2>

  @if($followers && $followers->count() > 0) <!-- フォロワーが存在するかチェック -->
  @foreach($followers as $follower)
  <tr>
    <td>
      <a href="{{ url('/profile/' . $follower->id) }}">
        <img src="{{ asset('storage/' . ($follower->icon_image ?? 'images/default-icon.png')) }}" alt="follower icon" width="40" height="40">
      </a>
    </td>
    <td>{{ $follower->username }}</td>
  </tr>
  @endforeach
  @else
  <tr>
    <td colspan="2">フォロワーはまだいません。</td>
  </tr>
  @endif


  <table class="table table-hover">
    @foreach($posts as $post)
    <tr>
      <td>
        <a href="{{ url('/profile/' . $follower->id) }}">
          <img src="{{ asset('storage/' . ($post->user->icon_image ?? 'images/default-icon.png')) }}" alt="user icon" width="40" height="40" ">
       </a>
      </td>
      <td>{{ $post->user->username }}</td>
      <td>{{ $post->post }}</td>
      <td>{{ $post->created_at }}</td>
    </tr>
    @endforeach
  </table>

</x-login-layout>
