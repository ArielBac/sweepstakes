<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset("css/app.css") }}" rel="stylesheet">
    <script defer src="{{ asset("js/app.js") }}" ></script>
    <title>Sweepstake | Ganhadores</title>
</head>

<body class="h-full">
    <div class="min-h-full" x-data>
        <div class="flex flex-col items-center justify-center min-h-screen"
        x-data="{
            animationfinished: false,
            init() { setTimeout(() => this.animationfinished = true, 1500) }
        }">
            <img x-show="!animationfinished" class="w-full h-full" src="{{ asset('gifs/confeti.gif') }}">

            <div class="flex flex-col" x-show="animationfinished" x-transition>
                <h1 class="text-2xl font-bold">Ganhadores</h1>

                @foreach ($winners as $winner)
                    <span class="text-lg font-normal">{{ $winner->name }}</span>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
