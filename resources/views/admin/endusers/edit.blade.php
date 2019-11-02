@extends('admin::layouts.base')

@section('title', 'End Users')

@section('content')
@component('admin::components.box')
@slot('title', 'Edit')
@slot('body')
<form id="edit-form" method="POST" action="{{ route('admin.endusers.update', [$enduser]) }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="form-group">
        <label for="id" class="control-label">ID</label>
        <input id="id" type="text" class="form-control" value="{{ $enduser->id }}" disabled>
    </div>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="control-label">Name</label>
        <input id="name" type="text" class="form-control"
               name="name" value="{{ old('name', $enduser->name) }}" required>
        @if ($errors->has('name'))
            <span class="help-block">
                {{ $errors->first('name') }}
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">Email</label>
        <input id="email" type="email" class="form-control"
               name="email" value="{{ old('email', $enduser->email) }}" required>
        @if ($errors->has('email'))
            <span class="help-block">
                {{ $errors->first('email') }}
            </span>
        @endif
    </div>
</form>
@endslot
@slot('footer')
<button type="submit" class="btn btn-primary" form="edit-form">
    Save
</button>
@endslot
@endcomponent

@component('admin::components.box')
@slot('title', 'Edit Password')
@slot('body')
<form id="edit-password-form" method="POST" action="{{ route('admin.endusers.update.password', [$enduser]) }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="control-label">Password</label>
        <input id="password" type="password" class="form-control" name="password" required>
        @if ($errors->has('password'))
            <span class="help-block">
                {{ $errors->first('password') }}
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="password-confirm" class="control-label">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
</form>
@endslot
@slot('footer')
<button type="submit" class="btn btn-primary" form="edit-password-form">
    Save Password
</button>
@endslot
@endcomponent
@endsection
