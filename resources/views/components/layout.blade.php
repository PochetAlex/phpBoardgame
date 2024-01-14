<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{$titre ?? "Boardgame"}}</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }
    </style>
</head>
<body class="font-sans bg-gray-100">
<header class="bg-blue-500 p-4 text-white">
    <nav class="flex justify-between items-center">
        <a href="{{route('games.index')}}" class="hover:text-gray-300">Accueil</a>
        <a href="{{route('games.create')}}" class="hover:text-gray-300">Ajouter un jeu</a>
    </nav>
</header>
<main class="container mx-auto mt-8 p-4">
    @if ($errors->any())
        <x-message-info titre="Information" :message="session('msg')">
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </x-message-info>
    @elseif(session('msg'))
        <x-information :type="session('type')" :message="session('msg')"></x-information>
    @endif
    {{$slot}}
</main>
<footer class="bg-blue-500 p-4 text-white text-center">
    IUT de Lens
</footer>
</body>
</html>
