<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ url('/') }}">{{ config('app.name') }}</a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item  {{ Request::routeIs('dashboard') ? "active":"" }}">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title">Master Data</li>

                <li class="sidebar-item {{ Request::is('users*') ? "active":"" }}">
                    <a href="{{ url('/users') }}" class='sidebar-link'>
                        <i class="bi bi-person"></i>
                        <span>User</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('roles*') ? "active":"" }}">
                    <a href="{{ url('/roles') }}" class='sidebar-link'>
                        <i class="bi bi-card-heading"></i>
                        <span>Role</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('permissions*') ? "active":"" }}">
                    <a href="{{ url('/permissions') }}" class='sidebar-link'>
                        <i class="bi bi-key"></i>
                        <span>Permission</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
