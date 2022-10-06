@extends('master')
@section('content')

<div>
    <form action="{{ route('pet.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">Import</button>
    </form>

    <a class="btn btn-success" href="{{route('pet.export') }}">Export</a>
    <table id="myTable" class="drop-shadow-2xl">
        <thead>
            <tr>
                <th>Id</th>
                <th>Pet Name</th>
                <th>Age</th>
                <th>Breed</th>
                <th>Sex</th>
                <th>Owner</th>
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
            ajax: "{!! route('pet.data') !!}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'pet_name',
                    name: 'pet_name'
                },
                {
                    data: 'age',
                    name: 'age'
                },
                {
                    data: 'breed',
                    name: 'breed'
                },
                {
                    data: 'sex',
                    name: 'sex'
                },
                {
                    data: 'owner',
                    name: 'owner'
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