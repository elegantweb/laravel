@extends('admin::layouts.base')

@section('title', 'Employees')

@section('content')
@component('admin::components.box')
    @slot('title', 'Edit')
    @slot('body')
        @include('admin.employees.forms.edit')
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
        @include('admin.employees.forms.editPassword')
    @endslot
    @slot('footer')
        <button type="submit" class="btn btn-primary" form="edit-password-form">
            Save Password
        </button>
    @endslot
@endcomponent
@endsection
