<x-login-layout>

  <div id="main-search-content">

    <form action="/search" method="get" id="search-area">
      @csrf
      <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="ユーザー名" id="search-textarea">
      <input type="image" src="{{ asset('images/search.png') }}" alt="Search" id="search-button">
    </form>

    <!-- 検索ワードを表示 -->
    @if (!empty(request('keyword')))
    <div>
      <p> <strong>検索ワード：{{ request('keyword') }}</strong></p>
    </div>
    @endif
  </div>


  <ul>
    @foreach ($users as $user)
    <li class="search-list">


      @if($user->icon_image != 'icon1.png')
      <img src="{{ asset('storage/icons/' . $user->icon_image) }}" alt="User Icon" width="40" height="40">
      @else
      <img src="{{ asset('images/icon1.png') }}" alt="User Icon" width="40" height="40">
      @endif


      <!-- <img src="{{ asset('storage/' . ($user->icon_image ?? 'images/default-icon.png')) }}" alt="user icon" width="40" height="40"> -->

      <span>{{ $user->username }}</span>
      @if ($user->id !== auth()->id()) <!-- 自分自身にはフォローボタンを表示しない -->
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
      @endif
    </li>
    @endforeach
  </ul>




</x-login-layout>
