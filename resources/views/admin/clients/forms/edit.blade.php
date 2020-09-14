<form id="edit-form"
        method="POST" action="{{ route('admin.clients.update', $client) }}">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="id">ID</label>
        <input id="id" type="text" class="form-control"
            value="{{ $client->id }}" disabled>
    </div>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Name</label>
        <input id="name" type="text" class="form-control"
               name="name" value="{{ old('name', $client->name) }}" required>
        @error('name')
            <span class="help-block">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control"
               name="email" value="{{ old('email', $client->email) }}" required>
        @error('email')
            <span class="help-block">
                {{ $message }}
            </span>
        @enderror
    </div>
</form>
