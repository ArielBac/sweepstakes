<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @vite('resources/css/app.css') --}}
    <link href="{{ asset("css/app.css") }}" rel="stylesheet">
    <title></title>
</head>

<body>

    <div class="dark:bg-gray-800 min-h-screen w-full flex flex-col items-center justify-center">
        <img class="h-30 mt-5" src="{{ asset('logo/logo.png') }}" alt="Logo">
        <h1 class="mb-10 text-3xl font-bold leading-tight tracking-tight text-gray-900 md:text-3xl dark:text-white">
            Sweepstake
        </h1>

        <div class="w-full mb-5">
            @yield('content')
        </div>
    </div>


</body>

</html>
