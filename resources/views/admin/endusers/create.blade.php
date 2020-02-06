@extends('admin::layouts.base')

@section('title', 'End Users')

@section('content')
@component('admin::components.box')
@slot('title', 'Create')
@slot('body')
<form id="create-form" method="POST" action="{{ route('admin.endusers.store') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Name</label>
        <input id="name" type="text" class="form-control"
               name="name" value="{{ old('name') }}" required>
        @if ($errors->has('name'))
            <span class="help-block">
                {{ $errors->first('name') }}
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control"
               name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="help-block">
                {{ $errors->first('email') }}
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control" name="password" required>
        @if ($errors->has('password'))
            <span class="help-block">
                {{ $errors->first('password') }}
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
</form>
@endslot
@slot('footer')
<button type="submit" class="btn btn-primary" form="create-form">
    Save
</button>
@endslot
@endcomponent
@endsection
