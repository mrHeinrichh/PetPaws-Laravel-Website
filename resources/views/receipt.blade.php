@extends('master')

@section('content')

<div class="h-full w-full flex justify-center items-center">

    <div class=" items-center shadow-lg shadow-gray-900 bg-white rounded-md p-12">
        <div class="text-3xl grid font-bold grid-cols-2 gap-20">YOUR RECEIPT <button type="submit" class="bg-sky-300 rounded-md justify-center text-white">Excell</button></div>
        <div class="space-x-24">
            <br>
            <div class="grid font-bold grid-cols-2 gap-20">
                <label>Summer Cut</label> <span> $500</span>
            </div>
            <div class="grid font-bold grid-cols-2 gap-20">
                <label>Winter Cut</label> <span> $500</span>
            </div>
            <div class="grid font-bold grid-cols-2 gap-20">
                <label>Halloween Cut</label> <span> $500</span>
            </div>
            <br>
        </div>
        <div class="justify-center">
            <button type="submit" class="bg-lime-500 rounded-md w-full flex justify-center  py-1 text-white">Go Back</button>
        </div>
    </div>
</div>
</div>
</div>
@endsection()