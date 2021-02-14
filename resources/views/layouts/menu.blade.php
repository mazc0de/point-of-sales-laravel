<li class="side-menus {{ Route::currentRouteNamed('home') ? 'active' : '' }}">
    <a class="nav-link" href="/dashboard">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>

<li class="nav-item dropdown {{ Route::currentRouteNamed('users.*') || Route::currentRouteNamed('roles.*')  ? 'active' : ''}}">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>User Management</span></a>
    <ul class="dropdown-menu" style="display: none;">
        <li class="{{ Route::currentRouteNamed('users.*') ? 'active' : ''}}">
            <a class="nav-link " href="{{ route('users.index')}}">Users</a>
        </li>
        @role('super-admin')
            <li class="{{ Route::currentRouteNamed('roles.*') ? 'active' : ''}}">
                <a class="nav-link " href="{{ route('roles.index')}}">Roles</a>
            </li>
        @endrole
    </ul>
</li>

