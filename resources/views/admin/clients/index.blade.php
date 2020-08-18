@extends('admin::layouts.base')

@section('title', 'Clients')

@section('content')
@component('admin::components.box')
    @slot('title', 'List')
    @slot('body')
        <table class="table table-bordered" id="table">
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
var $table = $('#table');
var dataTable = $table.DataTable({
    serverSide: true,
    ajax: '{{ route('admin.clients.dataTables') }}',
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
