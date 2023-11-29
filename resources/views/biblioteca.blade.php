<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
                {{ __('Juegos') }}
            </h2>
            <a href="{{ route('juegos.crear') }}">
                <button>AÑADIR+</button>
            </a>
        </div>
    </x-slot>

    <!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                transition: 0.5s;
                width: 30%;
                border-radius: 10px;
                margin: 50px
            }

            .card:hover {
                box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            }

            .container {
                padding: 2px 16px;
                text-align: center
            }

            .ml-4 {
                background-color: black;
                color: white;
                padding: 5px;
                border-radius: 4px
            }

            button {

            }
        </style>
    </head>

    <body>
        @foreach ($juegos as $juego)
            <div class="card">
                <img src="{{ $juego->imagen }}" style="width:100%">
                <div class="container">
                    <h1 style="display: inline;"><b>{{ $juego->nombre }}</b></h1><br>
                    <a href="{{ route('juegos.editar', ['juego' => $juego]) }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded">
                        Editar
                    </a>
                    @method('DELETE')
                    <a href="{{ route('juegos.eliminar', ['juego' => $juego]) }}"
                        class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded">
                        Eliminar
                    </a>
                </div>
            </div>
        @endforeach

    </body>

    </html>
</x-app-layout>
