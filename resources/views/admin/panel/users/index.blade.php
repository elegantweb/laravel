@extends('admin::panel.layouts.base')

@section('title', 'Users')

@section('content')
@component('admin::components.box')
@slot('title', 'List')
@slot('body')
<table class="table table-bordered" id="users-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Actions</th>
        </tr>
    </thead>
</table>
@endslot
@endcomponent
@endsection

@push('scripts')
<script>
var $usersTable = $('#users-table');
var usersDataTable = $usersTable.DataTable({
    serverSide: true,
    ajax: '{{ route('admin.users.datatables') }}',
    order: [[0, 'desc']],
    columns: [
        {
            data: "id"
        },
        {
            data: "name"
        },
        {
            data: "email"
        },
        {
            data: "created_at",
            type: "date"
        },
        {
            data: "actions",
            orderable: false,
            searchable: false
        }
    ]
});
</script>
@endpush
