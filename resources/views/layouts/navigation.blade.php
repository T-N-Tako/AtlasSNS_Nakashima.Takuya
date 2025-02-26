        <div id="head">
            <h3><a href="index"><img src="/images/atlas.png"></a></h3>
            <!-- <p>{{ Auth::user()->username }}さん</p> -->
            <img src="{{asset('storage/' . Auth::user()->icon_image)}}" alt="User Icon" class="user-icon" width="100">
            <dev class="menu">
                <div class="item">
                    <button class="toggle">{{ Auth::user()->username }}さん</button>
                    <ul class="dropdown">
                        <li><a href="/index">HOME</a></li>
                        <li><a href="/profile">プロフィール編集</a></li>
                        <li><a href="/logout">ログアウト</a></li>
                    </ul>
                </div>
            </dev>
        </div>
