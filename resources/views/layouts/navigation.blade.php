<div id="head">
    <h2><a href="index"><img src="/images/atlas.png"></a></h2>
    <div id="content">
        <div id="user-info">
            <p>{{ Auth::user()->username }}　さん　　<span class="arrow-down"></span></p>
            <img src="{{asset('storage/' . Auth::user()->icon_image)}}" alt="User Icon" id="icon" width="50">
        </div>
        <div id="accordion-menu">
            <ul>
                <li><a href="/index">HOME</a></li>
                <li><a href="/profile">プロフィール編集</a></li>
                <li>
                    <form id="logout-form" action="/logout" method="get">
                        <button type="submit">ログアウト</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
