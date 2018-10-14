<li>
    <a href="{{ route('admin.dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>{{ trans('admin.dashboard') }}</span>
    </a>
</li>

<li class="treeview">
    <a href="{{ route('admin.endusers.index') }}">
        <i class="fa fa-users"></i> <span>End Users</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('admin.endusers.index') }}"><i class="fa fa-circle-o"></i> All</a></li>
        <li><a href="{{ route('admin.endusers.create') }}"><i class="fa fa-circle-o"></i> New</a></li>
    </ul>
</li>

<li class="treeview">
    <a href="{{ route('admin.users.index') }}">
        <i class="fa fa-users"></i> <span>Users</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-circle-o"></i> All</a></li>
    </ul>
</li>
