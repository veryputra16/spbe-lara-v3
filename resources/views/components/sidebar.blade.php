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
                <li class="{{ Request::is('dashboard/d-app') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.dashboard-app') }}"><i
                            class="fas fa-fire"></i><span>Dashboard
                            Aplikasi</span></a>
                </li>
                <li class="{{ Request::is('dashboard/d-spbe') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.dashboard-spbe') }}"><i
                            class="fas fa-fire"></i><span>Dashboard
                            SPBE</span></a>
                </li>

                <li class="menu-header">System</li>
                {{-- <li class="{{ Request::is('system/aplikasi*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('system.aplikasi.index') }}"><i class="fas fa-globe"></i><span>Data
                            Aplikasi</span></a>
                </li> --}}
                <li class="{{ Request::is('system/subdomain*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('system.subdomain.index') }}"><i
                            class="fas fa-dungeon"></i><span>Portal
                            CMS</span></a>
                </li>

                <li class="menu-header">Master Data</li>
                <li class="nav-item dropdown {{ Request::is('masterapp/*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-archway"></i>
                        <span>Master Aplikasi</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('masterapp/katapp*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('masterapp.katapp.index') }}">Kategori Aplikasi</a>
                        </li>
                        <li class="{{ Request::is('masterapp/katdb*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('masterapp.katdb.index') }}">Kategori Database</a>
                        </li>
                        <li class="{{ Request::is('masterapp/katserver*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('masterapp.katserver.index') }}">Kategori Server</a>
                        </li>
                        <li class="{{ Request::is('masterapp/katplatform*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('masterapp.katplatform.index') }}">Kategori Platform</a>
                        </li>
                        <li class="{{ Request::is('masterapp/katpengguna*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('masterapp.katpengguna.index') }}">Kategori Penggunaan</a>
                        </li>
                        <li class="{{ Request::is('masterapp/bahasaprogram*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('masterapp.bahasaprogram.index') }}">Bahasa Pemrograman</a>
                        </li>
                        <li class="{{ Request::is('masterapp/frameworkapp*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('masterapp.frameworkapp.index') }}">Framework Aplikasi</a>
                        </li>
                        <li class="{{ Request::is('masterapp/layananapp*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('masterapp.layananapp.index') }}">Layanan Aplikasi</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-header">Settings</li>
                <li class="{{ Request::is('settings/opd*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('settings.opd.index') }}"><i
                            class="fas fa-building"></i><span>Perangkat
                            Daerah</span></a>
                </li>
                <li class="{{ Request::is('settings/user*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('settings.user.index') }}"><i
                            class="fas fa-users"></i><span>Users</span></a>
                </li>

                @if (Auth::user()->role == 'superadmin')
                    <li class="menu-header">Hak Akses</li>
                    <li class="{{ Request::is('hakakses') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('hakakses') }}"><i class="fas fa-user-shield"></i> <span>Hak
                                Akses</span></a>
                    </li>
                @endif
            </ul>
        </aside>
    </div>
@endauth
