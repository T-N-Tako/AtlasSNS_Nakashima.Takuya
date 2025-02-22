<x-login-layout>

  <div class="container">
    <main>

      <form action="/search" method="post" onsubmit="showSearchWord(event)" style="display: flex; align-items: center;">
        @csrf
        <input type="text" id="searchQuery" name="keyword" class="form" placeholder="ユーザー名">
        <button>
          <img src="images/search.png" alt="search Icon" class="search-icon">
        </button>
      </form>



      <!-- 検索ワードが出る枠 -->
      <!-- <div id="searchResult" style="margin-left: 20px; border: 1px solid red; padding: 5px; display: none;"></div> -->

      <!-- 検索ワードのスクリプト -->
      <!-- <script>
        function showSearchWord(event) {
          event.preventDefault(); // ページ遷移を防ぐ
          let query = document.getElementById("searchQuery").value;
          if (query) {
            document.getElementById("searchResult").innerText = "検索ワード：" + query;
            document.getElementById("searchResult").style.display = "block";
          }
        }
      </script> -->



      <table class="table table-hover">
        @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->username }}</td>
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
        @endforeach
      </table>


    </main>
  </div>


</x-login-layout>
