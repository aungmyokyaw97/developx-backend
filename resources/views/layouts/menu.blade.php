{{-- Dashboard --}}
<li class="nav-item">
    <a href="{{ route('home') }}"
       class="nav-link {{ Request::is('admin/home') ? 'active' : '' }}" style="color: white">
        <i class="nav-icon fas fa-tv"></i> <p>Dashboard</p>
    </a>
</li>

@can('project')
<li class="nav-item">
    <a href="{{ route('projects.index') }}" class="nav-link {{ Request::is('admin/projects*') ? 'active' : '' }}" style="color: white">
        <i class="nav-icon fas fa-project-diagram"></i>
        <p>Projects</p>
    </a>
</li>
@endcan
@can('job')
<li class="nav-item">
    <a href="{{ route('jobs.index') }}" class="nav-link {{ Request::is('admin/jobs*') ? 'active' : '' }}" style="color: white">
        <i class="nav-icon fas fa-tasks"></i>
        <p>Jobs</p>
    </a>
</li>
@endcan

@can('admin')
<li class="nav-item has-treeview" style="padding-bottom: 300px;">
    <a href="#" class="nav-link" style="color: white">
        <i class="nav-icon fas fa-user-shield"></i>
        <p> Admin Settings <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{-- Admins --}}
        <li class="nav-item">
            <a href="{{ route('admins.index') }}"
            class="nav-link {{ Request::is('admin/admins*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user" ></i><p> Backend Admins</p>
            </a>
        </li>
        {{-- Roles --}}
        @can('role')
        <li class="nav-item">
            <a href="{{ route('roles.index') }}"
            class="nav-link {{ Request::is('admin/roles*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tasks" ></i><p> Backend Roles</p>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endcan



