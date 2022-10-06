@extends('master')

@section('content')

<div class="h-full w-full flex justify-center items-center">
    <div class="flex flex-col items-center shadow-lg shadow-gray-900 bg-white rounded-md p-12">
        <p class="text-xl font-black">Login</p>
        <form class="flex flex-col items-center rounded-md gap-2" method="post" action="{{route('user.auth')}}">
            @csrf
            <div class="flex flex-col">
                <label for="email">Email</label>
                <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="email">
            </div>
            <div class="flex flex-col">
                <label for="Password">Password</label>
                <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="password" name="password">
            </div>
            <br>
            <button type="submit" class="bg-sky-300 w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-tiny text-white ">Log In</button>
        </form>
    </div>
</div>

@endsection()