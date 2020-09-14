<form id="create-form"
        method="POST" action="{{ route('admin.clients.store') }}">
    @csrf

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Name</label>
        <input id="name" type="text" class="form-control"
                name="name" value="{{ old('name') }}" required>
        @error('name')
            <span class="help-block">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control"
                name="email" value="{{ old('email') }}" required>
        @error('email')
            <span class="help-block">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control"
                name="password" required>
        @error('password')
            <span class="help-block">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control"
                name="password_confirmation" required>
    </div>
</form>
