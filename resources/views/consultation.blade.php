@extends('master')

@section('content')

<div class="h-full w-full flex justify-center items-center">
    
    <div class=" items-center shadow-lg shadow-gray-900 bg-white rounded-md p-12 ">
        <div class="text-3xl grid grid-cols-2 gap-10">Add Consultation  <button type="submit" class="bg-sky-300 flex justify-self-end  py-1 px-2 border border-transparent rounded-full text-white">Go back</button></div>
    
       
   
        <form class="flex flex-col rounded-md" method="post" action="{{route('user.auth')}}">
            @csrf
            <div>
                <label for="email">Pet Name</label>
                <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="email">
            </div>
            <div class="flex flex-col">
                <label for="Password">Date of Consultation</label>
                <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="password">
            </div>
            <div class="flex flex-col">
                <label for="Password">Fees</label>
                <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="password">
            </div>
            <div class="flex flex-col">
                <label for="Password">Diseases / Injury</label>
                <br>
                <div class="flex items-center mb-3 gap-4" >
                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ml-2 text-sm font-medium">Distemper</label> 
                    
                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ml-2 text-sm font-medium">Rabies</label>
                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ml-2 text-sm font-medium">Parasites</label>
                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ml-2 text-sm font-medium">Parvo</label>
                </div>
            </div>
           
            <br>
           <div class="grid place-items-end">
            <button type="submit" class="bg-sky-300  w-32 flex justify-center  py-1 px-2 border border-transparent rounded-full shadow-sm text-tiny text-white right-2.5 ">Add</button>
        </div>
        </form>
    </div>
</div>

@endsection()