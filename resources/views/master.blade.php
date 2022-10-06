<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pet Paws</title>

    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    @vite('resources/css/app.css')
</head>

<body class="h-screen">
    <nav class="nav drop-shadow-2xl bg-sky-300 flex flex-row justify-between items-center p-5">
        <div class="text-3xl">Pet <span class="text-white">Paws</span> </div>
        <div class="flex flex-row justify-between items-center gap-5">
            <a class="text-sm text-white" href="/">HOME</a>
            <a class="text-sm text-white" href="{{route('chart.pet_illness')}}">PET ILLNESS CHART</a>
            @if(auth()->check())

            @if(auth()->user()['role'] == 'Customer')
            <a class="text-sm text-white" href="{{route('pet.add')}}">ADD PET</a>
            <a class="text-sm text-white" href="{{route('transaction')}}">STORE</a>
            <a class="text-sm text-white" href="{{route('profile')}}">PROFILE</a>
            @endif

            @if(auth()->user()['role'] == 'Employee')
            <a class="text-sm text-white" href="{{route('pet')}}">PET</a>
            <a class="text-sm text-white" href="{{route('service')}}">SERVICE</a>
            <a class="text-sm text-white" href="{{route('transactions')}}">TRANSACTIONS</a>
            @endif

            @if(auth()->user()['role'] == 'Admin')
            <a class="text-sm text-white" href="{{route('pet')}}">PET</a>
            <a class="text-sm text-white" href="{{route('customer')}}">CUSTOMER</a>
            <a class="text-sm text-white" href="{{route('service')}}">SERVICE</a>
            <a class="text-sm text-white" href="{{route('transactions')}}">TRANSACTIONS</a>
            @endif

            @endif

            @if(!auth()->check())

            <a class="text-sm text-white" href="{{route('services')}}">SERVICES</a>

            <a class="text-sm bg-white text-sky-300 px-5 py-1 rounded-lg" href="{{route('admin.add')}}">SIGN UP AS ADMIN</a>
            <a class="text-sm bg-white text-sky-300 px-5 py-1 rounded-lg" href="{{route('employee.add')}}">SIGN UP AS EMPLOYEE</a>
            <a class="text-sm bg-white text-sky-300 px-5 py-1 rounded-lg" href="{{route('signup')}}">SIGN UP AS CUSTOMER</a>
            <a class="text-sm bg-white text-sky-300 px-5 py-1 rounded-lg" href="{{route('signin')}}">LOG IN</a>

            @else
            <a class="text-sm bg-white text-sky-300 px-5 py-1 rounded-lg" href="{{route('user.logout')}}">LOG OUT</a>
            @endif

        </div>
    </nav>

    <div class="body">
        @yield('content')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    @stack('scripts')
</body>

</html>