@extends('master')

@section('content')


<div>
    <canvas id="canvas" height="100px"></canvas>
</div>
@endsection()
@push('scripts')

<script>
    var url = "{!! route('pet_illness.data') !!}";
    var dataSets = [];
    $(document).ready(function() {
        $.get(url, function(response) {
            var ctx = document.getElementById("canvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Distemper', 'Rabies', 'Parasites', 'Parvo'],
                    datasets: [{
                        label: 'Number of Animals',
                        data: response,
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
    });
</script>
@endpush