<x-layout>
    <ul>
        <li>Nom: {{ $game['name'] ?? 'Nom non disponible' }}</li>
        <li>Description: {{ $game['description'] ?? 'Description non disponible' }}</li>
        <li>Prix: {{ $game['price'] ?? 'Prix non disponible' }}</li>
        @if(isset($game['image']))
            <li>Image:</li>
            <img src="{{ $game['image'] }}" alt="Image du jeu">
        @else
            <li>Image: Image non disponible</li>
        @endif
        <li>Catégorie: {{ $game['category'] ?? 'Catégorie non disponible' }}</li>
        @if(isset($game['video']))
            <li>Vidéo :</li>
            <video controls width="400">
                <source src="{{ $game['video'] }}" type="video/mp4">
                Votre navigateur ne supporte pas la lecture de vidéos.
            </video>
        @else
            <li>Vidéo : Vidéo non disponible</li>
        @endif
        <li>Nombre de joueurs: {{ $game['number_gamer'] ?? 'Nombre de joueurs non disponible' }}</li>
        <li>Temps de jeu: {{ $game['playing_time'] ?? 'Temps de jeu non disponible' }}</li>
        <li>Complexité: {{ $game['complexity'] ?? 'Complexité non disponible' }}</li>
        <li>Évaluation: {{ $game['rating'] ?? 'Évaluation non disponible' }}</li>
        <li>Nombre d'évaluations: {{ $game['number_rating'] ?? 'Nombre d\'évaluations non disponible' }}</li>
        <li>Date de publication: {{ $game['published_date'] ?? 'Date de publication non disponible' }}</li>
        <li>Classement: {{ $game['rank'] ?? 'Classement non disponible' }}</li>
    </ul>
    <div>
        @if($action == 'delete')
            <form action="{{route('games.destroy',$game["id"])}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="text-center">
                    <button type="submit" name="delete" value="valide" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Valide</button>
                    <button type="submit" name="delete" value="annule" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 ml-2">Annule</button>
                </div>
            </form>
        @else
            <div>
                <a href="{{route('games.index')}}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Retour à la liste</a>
            </div>
        @endif
    </div>
</x-layout>
