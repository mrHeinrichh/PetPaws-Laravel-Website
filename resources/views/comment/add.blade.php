@extends('master')

@section('content')
<br>
<div class="h-90 w-90 flex justify-center items-center">
    <div class=" items-center shadow-lg shadow-gray-900 bg-white rounded-md p-12">
        <div class="text-3xl">Send Feedback about our service!</div>
        <br>
        <form class="rounded-md" method="post" action="{{route('comment.store', ['id' => $id])}}">
            @csrf

            <div class="grid font-bold grid-cols-2 gap-2">
                <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" placeholder="Your Name" type="text" name="name">
                <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" placeholder="Your Email" type="text" name="email">
            </div>

            <br>
            <input name="content" type="text" name="email" cols="30" rows="5" placeholder="Comments / Suggestions / Feedback about our services"></textarea>
            <br>
            <div class="grid place-items-center grid font-bold grid-cols-2">
                <button type="submit" class="bg-sky-300  w-32 flex justify-center  py-1 px-2 border border-transparent rounded-full shadow-sm text-tiny text-white right-2.5 ">Save</button>
                <a href="{{route('service')}}">Cancel</button>
            </div>
        </form>
    </div>
</div>


</div>
@endsection()