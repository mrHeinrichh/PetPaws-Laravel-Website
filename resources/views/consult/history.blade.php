@extends('master')

@section('content')

<div class="h-full w-full">
    <div class="">Pet Name: {{$pet}}</div>

    <div class="flex flex-col gap-2">
        @foreach($data as $d)
        <div class="bg-sky-200 ">
            <div class="">Fee: {{$d['fee']}}</div>
            <div class="">Illness: {{$d['illness']}}</div>
            <div class="">Comment: {{$d['comment']}}</div>
            <div class="">Employee: {{$d['employee']['user']['first_name']}} {{$d['employee']['user']['last_name']}}</div>
            <div class="">Customer: {{$d['pet']['customer']['user']['first_name']}} {{$d['pet']['customer']['user']['last_name']}}</div>
        </div>
        @endforeach
    </div>

</div>
@endsection()