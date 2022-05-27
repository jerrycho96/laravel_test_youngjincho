<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">게시판</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @guest
                <a class="nav-link" href="{{ url('/') }}/login">로그인</a>
                <a class="nav-link" href="{{ url('/') }}/register"">회원가입</a>
                @endguest

                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li class="nav-item">

                        <a class="nav-link" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            로그아웃
                        </a>
                    </li>
                </form>
                @endauth
            </div>
        </div>
    </div>
</nav>