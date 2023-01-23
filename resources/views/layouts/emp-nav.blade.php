<nav class="navbar navbar-expand-lg" style="background-color: rgb(49, 47, 47)">
    @if (Auth::check())
        <a class="navbar-brand text-white " href="{{ route('employee') }}">Navbar</a>
    @else
        <a class="navbar-brand text-danger " href="/">Attendance Management</a>
    @endif

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @if (Auth::check())
                <li class="nav-item dropdown mx-4">
                    <a class="nav-link dropdown-toggle btn btn-success text-white" href="#" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ ucwords(auth()->user()->name) }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('attendance', ['id' => auth()->id()]) }}">Attendance
                            Sheet(
                            current month )</a>
                        @admin
                            <a class="dropdown-item" href="{{ route('admin') }}">Admin
                                Dashboard
                            </a>
                        @endadmin
                    </div>
                </li>
                <form class="form-inline mr-5" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-success mx-2" type="submit">Logout</button>
                </form>
            @endif
        </ul>

    </div>
</nav>
