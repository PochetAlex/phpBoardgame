<!doctype html>
<html lang=fr>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>{{$titre ?? "Boardgame"}}</title>
    </head>
    <body>
        <header>
            <nav>
                <a href="{{route('index')}}">Accueil</a>
                <a href="">Ajouter un jeu</a>
            </nav>
        </header>
        <main class="main-container">
            {{$slot}}
        </main>
        <footer>IUT de Lens</footer>
    </body>
</html>
