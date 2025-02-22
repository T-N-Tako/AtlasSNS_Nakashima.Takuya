<!-- 自分で作成したblad -->

<x-login-layout>

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


</x-login-layout>
