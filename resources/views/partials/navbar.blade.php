<nav class="navbar navbar-expand navbar-light navbar-bg">

    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>


    <a class="sidebar-brand text-secondary" href="{{ route('dashboard') }}">
        <span class="align-middle">{{ $title }}</span>
    </a>


    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">


            <li class="nav-item dropdown">


                <a class="nav-link d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <span class="text-dark">{{ Auth::user()->name }}</span>
                    <i class="bi bi-caret-down-fill"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="align-middle"
                            data-feather="log-out"></i>
                        Logout</a>
                </div>
            </li>

        </ul>
    </div>
</nav>
