@auth
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="https://spbe.denpasarkota.go.id/">{{ env('APP_NAME') }}</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="https://spbe.denpasarkota.go.id/">{{ env('APP_NAME') }}</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="{{ Request::is('dashboard-app') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('dashboard-app') }}"><i class="fas fa-fire"></i><span>Dashboard
                            Aplikasi</span></a>
                </li>
                <li class="{{ Request::is('dashboard-spbe') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('dashboard-spbe') }}"><i class="fas fa-fire"></i><span>Dashboard
                            SPBE</span></a>
                </li>
                @if (Auth::user()->role == 'superadmin')
                    <li class="menu-header">Hak Akses</li>
                    <li class="{{ Request::is('hakakses') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('hakakses') }}"><i class="fas fa-user-shield"></i> <span>Hak
                                Akses</span></a>
                    </li>
                @endif

                <li class="menu-header">Master Data</li>
                <li class="nav-item dropdown {{ Request::is('masterapp/*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-archway"></i>
                        <span>Master Aplikasi</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('masterapp/katapp*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ url('masterapp/katapp') }}">Kategori Aplikasi</a>
                        </li>
                </li>
            </ul>
            </li>
            </ul>
        </aside>
    </div>
@endauth
