@extends('master')

@section('content')

<div>
    <div class="consult">
        <div class="text-5xl font-medium">PET <span class="text-sky-300">PAWS</span> CLINIC/GROOMING </div>
        <p class="mt-5">The shop offers a wide range of services like breed specific haircuts, and health<br>
            checkups. A resident veterinarian provides excellent care for your fur babies. <br>
            your pet's wellbeing is their main concern.
        </p>
        <div class="flex-auto flex space-x-4">
            <button class="h-10 px-10 font-semibold rounded-3xl bg-sky-300 text-white mt-8" type="submit">
                CONSULT NOW
            </button>

        </div>
    </div>
    <img class="bg-image" src="/assets/background-image-customer-employee.png" alt="Background image">

</div>
@endsection()