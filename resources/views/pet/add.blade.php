@extends('master')
@section('content')

<div class="h-full w-full flex justify-center items-center " style="background-image: url(/assets/background-try.jpg); background-size:cover; background-repeat: repeat-y">

    <div class="flex flex-col items-center shadow-lg shadow-gray-900 bg-white rounded-md p-12">
        <form class="flex flex-col items-center rounded-md gap-2" method="post" action="{{route('pet.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col">
                <label for="pet_name">Pet Name</label>
                <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="pet_name">
            </div>
            <div class="flex flex-col">
                <label for="age">Age</label>
                <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="age">
            </div>
            <div class="flex flex-col">
                <label for="breed">Breed</label>
                <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="breed">
            </div>
            <div class="flex flex-col w-full">
                <label for="breed">Sex</label>
                <select class="form-control m-bot15 w-full" name="sex">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="flex justify-center items-center w-full">
                <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-30 bg-white rounded-lg border-2 border-white border-dashed cursor-pointer dark:hover:bg-white dark:bg-white hover:bg-white dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col justify-center items-center pt-5 pb-6">
                        <svg aria-hidden="true" class="mb-3 w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="mb-2 text-sm dark"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs dark">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" name="img_path" type="file" class="hidden" />
                </label>
            </div>
            <br>
            <button type="submit" class="bg-sky-300 w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-tiny text-white">Add new pet</button>
        </form>
    </div>
</div>

@endsection()