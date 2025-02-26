<x-login-layout>

  <h2>フォローリスト</h2>

  @if($following && $following->count() > 0) <!-- フォローしているユーザーが存在するかチェック -->
  @foreach($following as $followed)
  <tr>
    <td>
      <a href="{{ url('/profile/' . $followed->id) }}">
        <img src="{{ asset('storage/' . ($followed->icon_image ?? 'images/default-icon.png')) }}" alt="followed icon" width="40" height="40">
      </a>
    </td>
    <td>{{ $followed->username }}</td>
  </tr>
  @endforeach
  @else
  <tr>
    <td colspan="2">フォローしているユーザーはまだいません。</td>
  </tr>
  @endif

  <table class="table table-hover">
    @foreach($posts as $post)
    <tr>
      <td>
        <a href="{{ url('/profile/' . $followed->id) }}">
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
