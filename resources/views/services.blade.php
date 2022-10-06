@extends('master')

@section('content')

<div class="h-full w-full flex flex-row flex-wrap gap-5">
    <!-- Add your page here -->
    @foreach($services as $service)
    <div class="h-36 shadow-lg shadow-gray-900 justify-center items-center rounded-md p-12">
        <img src="{{$service['img_path']}}" width="150" alt="service">
        <span>{{$service['service_name']}}</span><br>
        <Span>PHP {{$service['price']}}</Span>

        <br>
        <div class="justify-end">
            <a href="{{route('comment.add', ['id' => $service['id']])}}" class="bg-sky-300 h-10 w-full py-1 px-2 rounded-full text-white ">Add Comment</a>
        </div>
    </div>
    @endforeach

</div>
@endsection()