@extends('master')

@section('content')

<div class="h-full w-full flex flex-row flex-wrap gap-5">
    <!-- Add your page here -->
    @foreach($pets as $pet)
    <div class="h-36 shadow-lg shadow-gray-900 justify-center items-center rounded-md p-12">
        <img src="{{$pet['img_path']}}" width="150" alt="service">
        <span>Name: {{$pet['pet_name']}}</span><br>
        <Span>Age: {{$pet['age']}}</Span>
        <div class="justify-end">
            <a href="{{route('transaction.add', ['service' => $service, 'pet' => $pet['id']])}}" class="bg-sky-300  h-10  w-full   py-1 px-2  rounded-full text-white ">Choose</a>
        </div>
    </div>
    @endforeach

</div>
@endsection()