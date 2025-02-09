<x-login-layout>

  <form action="/search" method="get" onsubmit="showSearchWord(event)" style="display: flex; align-items: center;">
    @csrf
    <input type="text" id="searchQuery" name="keyword" class="form" placeholder="ユーザー名">

    <button>
      <img src="images/search.png" alt="search Icon" class="search-icon">
    </button>

    <button type="button" class="btn btn-primary">フォローする</button>
    <button type="button" class="btn btn-danger">フォロー解除</button>

  </form>

  <!-- 検索ワードが出る枠 -->
  <div id="searchResult" style="margin-left: 20px; border: 1px solid red; padding: 5px; display: none;"></div>

  <!-- 検索ワードのスクリプト -->
  <script>
    function showSearchWord(event) {
      event.preventDefault(); // ページ遷移を防ぐ
      let query = document.getElementById("searchQuery").value;
      if (query) {
        document.getElementById("searchResult").innerText = "検索ワード：" + query;
        document.getElementById("searchResult").style.display = "block";
      }
    }
  </script>




</x-login-layout>
