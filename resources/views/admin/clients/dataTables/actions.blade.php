<a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-default btn-xs">
    Edit
</a>

<form method="POST" action="{{ route('admin.clients.destroy', $client) }}" class="display-inline">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">
        Delete
    </button>
</form>
