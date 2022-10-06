@extends('master')

@section('content')

<div class="h-full w-full flex flex-row flex-wrap gap-5">
    <!-- Add your page here -->
    @foreach($services as $service)
    <div class="h-36 shadow-lg shadow-gray-900 justify-center items-center rounded-md p-12">
        <img src="{{$service['img_path']}}" width="150" alt="service">
        <span>{{$service['service_name']}}</span><br>
        <Span>PHP {{$service['price']}}</Span>
        <div class="justify-end">
            <a href="{{route('comment', ['id' => $service['id']])}}" class="bg-lime-500 h-10 w-full py-1 px-2 rounded-full text-white">View Comment</a>
        </div>
        <br>
        <div class="justify-end">
            <a href="{{route('transaction.pet', ['service' => $service['id']])}}" class="bg-sky-300 h-10 w-full py-1 px-2 rounded-full text-white">Add Services</a>
        </div>
    </div>
    @endforeach
    <a href="{{route('checkout')}}">Checkout Cart</a>
</div>
@endsection()