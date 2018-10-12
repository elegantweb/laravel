<a href="{{ route('admin.endusers.edit', [$model]) }}" class="btn btn-default btn-xs">Edit</a>

<form method="POST" action="{{ route('admin.endusers.destroy', [$model]) }}" class="display-inline">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button class="btn btn-default btn-xs" onclick="return confirm('Are you sure?')">
        Delete
    </button>
</form>
