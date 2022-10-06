@extends('master')

@section('content')

<div class="h-full w-full flex justify-center items-center">

    <div class=" items-center shadow-lg shadow-gray-900 bg-white rounded-md p-12 ">
        <div class="text-3xl grid grid-cols-2 gap-10">Add Consultation <button type="submit" class="bg-sky-300 flex justify-self-end  py-1 px-2 border border-transparent rounded-full text-white">Go back</button></div>

        <form class="flex flex-col rounded-md" method="post" action="{{route('consult.add', ['id' => $id])}}">
            @csrf
            <div>
                <label for="email">Comment</label>
                <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="comment">
            </div>
            <div class="flex flex-col">
                <label for="Password">Fee</label>
                <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="fee">
            </div>
            <div class="flex flex-col">
                <label for="Password">Diseases / Injury</label>
                <br>
                <select class="form-control m-bot15 w-full" name="illness">
                    <option value="Distemper">Distemper</option>
                    <option value="Rabies">Rabies</option>
                    <option value="Parasites">Parasites</option>
                    <option value="Parvo">Parvo</option>
                </select>

            </div>

            <br>
            <div class="grid place-items-end">
                <button type="submit" class="bg-sky-300  w-32 flex justify-center  py-1 px-2 border border-transparent rounded-full shadow-sm text-tiny text-white right-2.5 ">Add</button>
            </div>
        </form>
    </div>
</div>

@endsection()