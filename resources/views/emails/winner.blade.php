<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <div style="display: flex; flex-direction: column;">
        <h1 style="font-size: 40px; font-wight: bold;">Parabéns, você ganhou o sorteio {{ $sweepstake->title }}</h1>

        <div style="margin-top: 40px; font-size: 20px;">{{ $sweepstake->description }}</div>

        <div style="margin-top: 40px; font-size: 20px;">Em breve alguém entrará em contato com você! Fique de olho no seu
            e-mail.</div>
    </div>
</body>

</html>
