@extends('master')

@section('content')

<div class="h-full w-full flex justify-center items-center">

    <div class=" items-center shadow-lg shadow-gray-900 bg-white rounded-md p-12">
        <div class="text-3xl ">Pet Edit<span class="text-sky-300"> Profile</span> </div>
        <br>
        <div class="grid grid-cols-2 gap-20">
            <img class="h-80 w-80" src="/assets/petprofile.png" alt="Customer-Profile">
            <div>

                <form class="flex flex-col rounded-md">
                    @csrf

                    <div>
                        <label for="id">Pet ID</label>
                        <input  class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="id">
                    </div>
                    <div>
                        <label for="first_name">Pet Name</label>
                        <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="first_name">
                    </div>
                    <div>
                        <label for="last_name">Age</label>
                        <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="last_name">
                    </div>

                    <div>
                        <label for="email">Type</label>
                        <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="email">
                    </div>
                    <div>
                        <label for="email">Breed</label>
                        <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="email">
                    </div>
                    <div>
                        <label for="email">Gender</label>
                        <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="email">
                    </div>
                    <br>

                    <div class="flex justify-center items-center w-full">
                        <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-24 bg-white rounded-lg border-2 border-white border-dashed cursor-pointer dark:hover:bg-white dark:bg-white hover:bg-white dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
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
                    <div class="grid place-items-end">
                        <button type="submit" class="bg-sky-300  w-32 flex justify-center  py-1 px-2 border border-transparent rounded-full shadow-sm text-tiny text-white right-2.5 ">Confirm</button>
                    </div>
                </form>
            </div>
        </div>

        @endsection()