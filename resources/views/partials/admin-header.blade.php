<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('blog.index') }}">Laravel Guide</a>
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('admin.index') }}">Posts</a></li>

                @if( !\Illuminate\Support\Facades\Auth::check())
                    <li><a href="{{url("/register")}} ">Register </a></li>
                    <li><a href="{{ url("/login") }} ">Login </a></li>
                @else
                    <li>
                        <a href="#"
                           onclick = "document.getElementById('logout-form').submit()"> Logout </a>
                        <form action="{{ url("/logout") }}" id="logout-form" method="POST">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>

