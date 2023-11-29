<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    @can('ver-usuarios')
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>@endcan
    @can('ver-roles')
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>@endcan
    @can('ver-blogs')
    <a class="nav-link" href="/blogs">
        <i class=" fas fa-blog"></i><span>Blogs</span>
    </a>@endcan
    @can('ver-grupos')
    <a class="nav-link" href="/grupos">
        <i class="fas fa-building"></i><span>Grupos</span>
    </a>@endcan
    @can('ver-profesores')
    <a class="nav-link" href="/profesores">
        <i class="fas fa-users"></i><span>Profesores</span>
    </a>@endcan
    
    @can('ver-cursos')
    <a class="nav-link" href="/cursos">
        <i class="fas fa-building"></i><span>Cursos</span>
    </a>@endcan
</li>
