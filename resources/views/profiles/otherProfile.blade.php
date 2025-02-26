<!-- 自分で作成したblad -->

<x-login-layout>

  <table class="table table-hover">
    <tr>
      <td>
        <img src="{{ asset('storage/' . ($user->icon_image ?? 'images/default-icon.png')) }}" alt="follower icon" width="40" height="40">
      </td>
      <td>{{ $user->username }}</td>
      <td>{{ $user->bio }}</td>
      @if ($user->id !== auth()->id()) <!-- 自分自身にはフォローボタンを表示しない -->
      <td>
        @if (auth()->user()->isFollowing($user->id))
        <form action="/toggleFollow/{{$user->id}}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
        @else
        <form action="/toggleFollow/{{$user->id}}" method="POST">
          @csrf
          <button type="submit" class="btn btn-primary">フォロー</button>
        </form>
        @endif
      </td>
      @endif
    </tr>


    <table class="table table-hover">
      @foreach($posts as $post)
      <tr>
        <td>
          <img src="{{ asset('storage/' . ($post->user->icon_image ?? 'images/default-icon.png')) }}" alt="user icon" width="40" height="40" ">
          </td>
      <td>{{ $post->user->username }}</td>
      <td>{{ $post->post }}</td>
      <td>{{ $post->created_at }}</td>
    </tr>
    @endforeach
  </table>


  </table>

</x-login-layout>
