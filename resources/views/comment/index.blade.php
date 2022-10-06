@extends('master')

@section('content')
<br>
<div class="h-90 w-90 flex justify-center items-center">
    <div class="">
    </div>
</div>
<br>
<hr>
<br>
<div class="h-56 grid grid-cols-3 content-start">
    @foreach($data as $d)
    <div class="flex flex-col shadow-lg shadow-gray-900 bg-white rounded-md p-12 ">
        <div class="text-3xl justify-between font-medium">Name: {{$d['name']}}</div>
        <div class="text-sm justify-between font-small">Email: {{$d['email']}} </div>
        <div class="text-xl justify-between font-small">Comment: </div>
        <div class="text-xl justify-between font-small">{{$d['content']}}</div>
    </div>
    @endforeach
</div>
@endsection()