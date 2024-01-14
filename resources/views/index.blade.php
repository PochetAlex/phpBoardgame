<x-layout>
    <h2>La liste des jeux</h2>

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
                    <!-- Supprimer jeu -->
                    Supprimer
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <h3>Aucun jeu</h3>
@endif

</x-layout>
