<nav class="navbar navbar-expand-lg navbar-light bg-light header">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        {{--<li class="nav-item">
            <a class="nav-link" href="#">首页</a>
        </li>--}}
      </ul>
      <ul class="navbar-nav ml-auto">
        @guest
          <li class="nav-item {{ active_class(if_route('login')) }}">
            <a class="nav-link" href="{{ route('login') }}">登录</a>
          </li>
          <li class="nav-item {{ active_class(if_route('register')) }}">
            <a class="nav-link" href="{{ route('register') }}">注册</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0);">{{ \Auth::user()->nickname }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0);"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">退出</a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        @endguest
      </ul>
    </div>
  </div>
</nav>
