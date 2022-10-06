@extends('master')

@section('content')



<div class="h-2/4 w-full flex justify-center items-center">
   
    <div class="grid grid-cols-2 items-center shadow-lg shadow-gray-900 bg-white rounded-md p-12">
        
            <img class="h-80 w-80" src="/assets/petprofile.png" alt="Customer-Profile">
                <form class="grid grid-cols-2 gap-5 flex flex-col rounded-md">  
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
                    <div class="justify-end">
                        <button type="submit" class="bg-sky-300  w-32   py-1 px-2  rounded-full text-white ">Add More Pet</button>
                    </div>
                </form>
    </div>
</div>

<div class="grid grid-cols-3">


<div class="shadow-lg shadow-gray-900 bg-white rounded-md p-12 h-6/5 w-3/4">
    <img class="h-auto w-auto" src="/assets/about-photo-3.png" alt="service">
    <div class="m-4  ">
       
        <span> Summer Cut</span><br>
        <Span>$123123</Span>
        <div class="justify-end">
            <button type="submit" class="bg-lime-500 h-10 w-full   py-1 px-2  rounded-full text-white ">View Comment</button>
        </div>
        <br>
        <div class="justify-end">
            <button type="submit" class="bg-sky-300  h-10  w-full   py-1 px-2  rounded-full text-white ">Add Services</button>
        </div>
    </div>
</div>

<div class="shadow-lg shadow-gray-900 bg-white rounded-md p-12 h-6/5 w-3/4">
    <img class="h-auto w-auto" src="/assets/about-photo-3.png" alt="service">
    <div class="m-4  ">
       
        <span> Halloween Cut</span><br>
        <Span>$5700</Span>
        <div class="justify-end">
            <button type="submit" class="bg-lime-500 h-10 w-full   py-1 px-2  rounded-full text-white ">View Comment</button>
        </div>
        <br>
        <div class="justify-end">
            <button type="submit" class="bg-sky-300  h-10  w-full   py-1 px-2  rounded-full text-white ">Add Services</button>
        </div>
    </div>
</div>

<div class="shadow-lg shadow-gray-900 bg-white rounded-md p-12 h-6/5 w-3/4">
    <img class="h-auto w-auto" src="/assets/about-photo-3.png" alt="service">
    <div class="m-4  ">
       
        <span> Winter Cut</span><br>
        <Span>$500</Span>
        <div class="justify-end">
            <button type="submit" class="bg-lime-500 h-10 w-full   py-1 px-2  rounded-full text-white ">View Comment</button>
        </div>
        <br>
        <div class="justify-end">
            <button type="submit" class="bg-sky-300  h-10  w-full   py-1 px-2  rounded-full text-white ">Add Services</button>
        </div>
    </div>
</div>
</div>


        @endsection()