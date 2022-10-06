@extends('master')

@section('content')

<div class="h-full w-full flex justify-center items-center">

    <div class="p-12 rounded-md shadow-lg shadow-gray-900">
        @foreach($items as $key=>$item)
        <div class="flex flex-row bg-orange-100 p-12">

            <div class="flex flex-col bg-orange-100 justify-between">
                <p>{{$key + 1}}. </p>
                <p>Service Name: {{$item['service_name']}}</p>
                <p>Service Price: {{$item['price']}}</p>
                <a href="{{route('transaction.delete', ['id' => $key])}}">Delete</a>
            </div>
        </div>
        @endforeach
        <a href="{{route('transaction.store')}}">Confirm</a>
    </div>

</div>
@endsection()