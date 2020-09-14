<form id="edit-form"
        method="POST" action="{{ route('admin.employees.update', $employee) }}">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="id">ID</label>
        <input id="id" type="text" class="form-control"
                value="{{ $employee->id }}" disabled>
    </div>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Name</label>
        <input id="name" type="text" class="form-control"
                name="name" value="{{ old('name', $employee->name) }}" required>
        @error('name')
            <span class="help-block">
                {{ $errors->first('name') }}
            </span>
        @enderror
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control"
                name="email" value="{{ old('email', $employee->email) }}" required>
        @error('email')
            <span class="help-block">
                {{ $errors->first('email') }}
            </span>
        @enderror
    </div>
</form>
