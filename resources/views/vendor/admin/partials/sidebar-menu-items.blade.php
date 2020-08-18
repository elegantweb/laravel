<li>
    <a href="{{ route('admin.dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>

<li class="treeview">
    <a href="{{ route('admin.clients.index') }}">
        <i class="fa fa-users"></i> <span>Clients</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('admin.clients.index') }}"><i class="fa fa-circle-o"></i> All</a></li>
        <li><a href="{{ route('admin.clients.create') }}"><i class="fa fa-circle-o"></i> New</a></li>
    </ul>
</li>

<li class="treeview">
    <a href="{{ route('admin.employees.index') }}">
        <i class="fa fa-users"></i> <span>Employees</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('admin.employees.index') }}"><i class="fa fa-circle-o"></i> All</a></li>
    </ul>
</li>
