<nav class="navbar navbar-expand-lg" style="background-color: rgb(49, 47, 47)">
    @admin
        <a class="navbar-brand text-white " href="{{ route('admin') }}">Admin Dashboard</a>
    @endadmin


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @if (Auth::check())
                @admin
                    <li class="nav-item dropdown mx-4">

                        <a class="nav-link dropdown-toggle btn btn-success text-white" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/admin/add-employee">Add New Employee</a>
                            <a class="dropdown-item" href="{{ route('employee') }}">My Dashboard
                            </a>

                        </div>
                    </li>

                    <form class="form-inline mr-5" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-success mx-2" type="submit">Logout</button>
                    </form>
                @endadmin

            @endif
        </ul>

    </div>
</nav>
