@extends('admin::layouts.base')

@section('title', 'Clients')

@section('content')
@component('admin::components.box')
    @slot('title', 'Create')
    @slot('body')
        @include('admin.clients.forms.create')
    @endslot
    @slot('footer')
        <button type="submit" class="btn btn-primary" form="create-form">
            Save
        </button>
    @endslot
@endcomponent
@endsection
