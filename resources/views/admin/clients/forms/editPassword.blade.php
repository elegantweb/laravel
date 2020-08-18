<form id="edit-password-form"
        method="POST" action="{{ route('admin.clients.update.password', $client) }}">
    @csrf
    @method('PATCH')

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
