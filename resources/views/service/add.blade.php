@extends('master')
@section('content')

<div class="h-full w-full flex justify-center items-center">
    <div class="flex flex-col items-center shadow-lg shadow-gray-900 bg-white rounded-md p-12">
        <p class="text-xl font-black">Create An Account</p>
        <form class="flex flex-col items-center rounded-md gap-2" method="post" action="{{route('service.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col">
                <label for="service_name">Serivce Name</label>
                <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="service_name">
            </div>
            <div class="flex flex-col">
                <label for="price">Price</label>
                <input class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm" type="text" name="price">
            </div>
            <div class="flex flex-col">
                <label for="img_path" class="control-label">Service Pic:</label><i style="color:red"></i>
                <input type="file" class="form-control" id="img_path" name="img_path">
            </div>
            <br>
            <button type="submit" class="bg-sky-300 w-full py-2 px-4 rounded-md shadow-sm text-tiny font-medium text-white">Create Service</button>
        </form>
    </div>
</div>

@endsection()