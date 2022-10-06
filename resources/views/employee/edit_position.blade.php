@extends('master')

@section('content')

<div class="h-full w-full flex justify-center items-center">

    <div class=" items-center shadow-lg shadow-gray-900 bg-white rounded-md p-12">
        <div class="text-3xl ">Employee<span class="text-sky-300"> Profile</span> </div>
        <br>
        <div class="grid grid-cols-2 gap-10">
            <img class="h-80 w-80" src="{{$data['user']['img_path']}}" alt="Employee-Profile">
            <div>

                <form class="flex flex-col rounded-md" method="post" action="{{route('employee.change_position', ['id' => $data['id']])}}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label for="id">User ID</label>
                        <input disabled value="{{$data['user']['id']}}" class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="id">
                    </div>
                    <div>
                        <label for="first_name">First Name</label>
                        <input disabled value="{{$data['user']['first_name']}}" class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="first_name">
                    </div>
                    <div>
                        <label for="last_name">Last Name</label>
                        <input disabled value="{{$data['user']['last_name']}}" class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="last_name">
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input disabled value="{{$data['user']['email']}}" class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="email">
                    </div>

                    <div class="flex flex-col w-full">
                        <label for="position">Position</label>
                        <select class="form-control m-bot15 w-full" name="position" value="{{$data['position']}}">
                            <option value="Assistant">Assistant</option>
                            <option value="Vet">Vet</option>
                            <option value="Groomer">Groomer</option>
                        </select>
                    </div>

                    <br>
                    <div class="grid place-items-end">
                        <button type="submit" class="bg-sky-300  w-32 flex justify-center  py-1 px-2 border border-transparent rounded-full shadow-sm text-tiny text-white right-2.5 ">Confirm</button>
                    </div>
                </form>
            </div>
        </div>

        @endsection()