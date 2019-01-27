<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset("favicon.png")}}" height="25"> {{ env('APP_NAME') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                User
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route("user.index")}}">User List</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route("user.create")}}">Create User</a>
            </div>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route("api.user.index")}}">API Index</a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item px-2 active">
            @if(Auth::check())
            <a class="btn btn-sm btn-success" href="{{route("dashboard.profile")}}"><img class="bg-white rounded-circle mr-1" width="20" src="{{Auth::user()->profileImg}}">{{Auth::user()->givenName}}</a>
        </li>
        <li class="nav-item active">
            <a class="btn btn-sm btn-danger text-white" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt pr-1"></i>{{__('Logout')}}</a>
            <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none;">
                @csrf
            </form>
        </li>
        @else
        <li class="nav-item active">
            <a class="btn btn-sm btn-success" href="{{url("/login")}}"><i class="fas fa-sign-in-alt pr-1"></i>Login</a>
        </li>
        @endif

    </ul>
</nav>