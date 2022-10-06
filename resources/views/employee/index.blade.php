@extends('master')

@section('content')

<div>

    <form action="{{ route('employee.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">Import</button>
    </form>

    <a class="btn btn-success" href="{{route('employee.export') }}">Export</a>
    <table id="myTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>

    </table>
</div>
@endsection()
@push('scripts')

<script>
    $(function() {
        $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('employee.data') !!}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'user.first_name',
                    name: 'first_name'
                },
                {
                    data: 'user.last_name',
                    name: 'last_name'
                },
                {
                    data: 'user.email',
                    name: 'user.email'
                },
                {
                    data: 'position',
                    name: 'position'
                },
                {
                    data: 'img',
                    name: 'img',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });
</script>
@endpush