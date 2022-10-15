<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title></title>
</head>

<body>

    <div class="min-h-screen w-full flex flex-col items-center justify-center bg-gradient-to-tr from-primary-dark to-primary-light">
        <img class="h-30 mb-8" src="{{ asset('logo/logo.png') }}" alt="Logo">

        <div class="flex flex-col rounded border border-solid border-white p-4 w-[280px]">
            @yield('content')
        </div>
    </div>


</body>

</html>
