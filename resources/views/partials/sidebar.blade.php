<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="">
            <span class="align-middle"> {{ config('app.name') }}</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Navigasi
            </li>

            <li class="sidebar-item {{ $active === 'dashboard' ? 'active' : '' }} ">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ $active === 'post' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('posts') }}">
                    <i class="align-middle" data-feather="tag"></i> <span class="align-middle">Manajemen
                        Wisata</span>
                </a>
            </li>

            <li class="sidebar-item {{ $active === 'category' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('categories') }}">
                    <i class="align-middle" data-feather="folder"></i> <span class="align-middle">Manajemen
                        Kategori</span>
                </a>
            </li>

        </ul>

    </div>
</nav>
