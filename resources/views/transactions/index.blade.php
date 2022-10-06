@extends('master')
@section('content')

<div>
    <table id="myTable" class="drop-shadow-2xl">
        <thead>
            <tr>
                <th>Id</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Approved</th>
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
            ajax: "{!! route('transaction.data') !!}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'customer.user.first_name',
                    name: 'customer.user.first_name'
                },
                {
                    data: 'total',
                    name: 'total'
                },
                {
                    data: 'approved',
                    name: 'approved'
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