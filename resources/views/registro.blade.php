<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('registrar') }}" method="POST">
        @csrf
        <input type="text" name="name" id="name" placeholder="Nombre" value="{{ @old('name') }}">
        <input type="email" name="email" id="email" placeholder="patata@patata.com" value="{{ @old('email') }}">
        <input type="password" name="password" id="password" placeholder="Contraseña" value="{{ @old('password') }}">
        <button type="submit">Enviar</button>
    </form>
    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
