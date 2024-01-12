<html>
<head>
    <title>Liste des jeux</title>
    <style>
        table, td {
            border: 1px solid;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }
        tr, td, body {
            text-align: center;
            padding: 5px;
        }
    </style>
    <script>
        function confirmDelete(id) {
            if (confirm('Voulez-vous vraiment supprimer ce jeu ?')) {
                document.getElementById(`deleteForm_${id}`).submit();
            }
        }
    </script>
</head>
<body>

<h2>La liste des jeux</h2>

<h2>Ajouter un nouveau jeu</h2>
<form method="POST" action="{{ route('addGame') }}">
    @csrf
    <label for="name">*Nom du jeu:</label>
    <input type="text" id="name" name="name"><br><br>

    <label for="price">Prix:</label>
    <input type="text" id="price" name="price"><br><br>

    <label for="number_gamer">Nombre de joueurs:</label>
    <input type="text" id="number_gamer" name="number_gamer"><br><br>

    <label for="playing_time">Temps de jeu:</label>
    <input type="text" id="playing_time" name="playing_time"><br><br>

    <label for="complexity">Complexité:</label>
    <input type="text" id="complexity" name="complexity"><br><br>

    <label for="category">Catégorie:</label>
    <input type="text" id="category" name="category"><br><br>

    <label for="published_date">Date de publication:</label>
    <input type="text" id="published_date" name="published_date"><br><br>

    <label for="description">*Description:</label><br>
    <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

    <button type="submit">Ajouter le jeu</button>
</form>


@if(!empty($jeux))
    <table>
        <thead>
        <tr>
            <td>ID</td>
            <td>Nom</td>
            <td>Description</td>
            <td>Prix</td>
            <td>Nombre de joueurs</td>
            <td>Temps de jeu</td>
            <td>Complexité</td>
            <td>Évaluation</td>
            <td>Catégorie</td>
            <td>Date de publication</td>
            <td>Détails jeu</td>
            <td>Suppression</td>
        </tr>
        </thead>
        <tbody>
        @foreach($jeux as $jeu)
            <tr>
                <td>{{$jeu["id"]}}</td>
                <td>{{$jeu["name"]}}</td>
                <td>{{$jeu["description"]}}</td>
                <td>{{$jeu["price"]}}</td>
                <td>{{$jeu["number_gamer"]}}</td>
                <td>{{$jeu["playing_time"]}}</td>
                <td>{{$jeu["complexity"]}}</td>
                <td>{{$jeu["rating"]}}</td>
                <td>{{$jeu["category"]}}</td>
                <td>{{$jeu["published_date"]}}</td>
                <td><a href="{{ route('showGame', ['id' => $jeu['id']]) }}">Voir détails</a></td>
                <td>
                    <!-- Formulaire pour chaque jeu avec un bouton de suppression -->
                    <form id="deleteForm_{{ $jeu['id'] }}" method="POST" action="{{ route('deleteGame', ['id' => $jeu['id']]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete({{ $jeu['id'] }})">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <h3>Aucun jeu</h3>
@endif

</body>
</html>
