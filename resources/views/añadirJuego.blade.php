<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <form action="{{route('juegos.guardar')}}" method="POST">
            @csrf
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" value=""><br><br>
            <label for="url">Url imagen:</label><br>
            <input type="text" id="url" name="url" value=""><br><br>
            <input type="submit" value="Insertar">
        </form>
    </body>

    </html>
</x-app-layout>