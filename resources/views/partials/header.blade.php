<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="{{ route('blog.index') }}" class="navbar-brand">Laravel Guide</a>
            <ul class="nav navbar-nav">
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li><a href="{{ route('other.about') }}">About</a></li>
                <li><a href="{{ route('admin.index') }}">Admin</a></li>
                @if( !\Illuminate\Support\Facades\Auth::check())
                <li><a href="{{url("/register")}} ">Register </a></li>
                <li><a href="{{ url("/login") }} ">Login </a></li>
                @else
                <li>
                    <a href="#"
                       onclick = "logout()"> Logout </a>
                    <form action="{{ url("/logout") }}" id="logout-form" method="POST">
                        {{ csrf_field() }}
                    </form>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<script>
    function logout() {
        document.getElementById('logout-form').submit();
    }
</script>
