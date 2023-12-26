<!-- show_game.blade.php -->
<html>
<head>
    <title>Détails du jeu</title>
</head>
<body>
<h2>Détails du jeu</h2>
<script>
    function confirmDelete() {
        if (confirm("Voulez-vous vraiment supprimer ce jeu ?")) {
            // Utilisez la méthode POST avec un champ caché pour simuler la méthode DELETE
            const form = document.getElementById('deleteForm');
            form.submit();
        }
    }
</script>
<h3><a href="{{ route('index') }}">Accueil</a></h3>
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
        <li>Vidéo:</li>
        <video controls width="400">
            <source src="{{ $game['video'] }}" type="video/mp4">
            <!-- Ajoutez d'autres sources vidéo pour différents formats si nécessaire -->
            Votre navigateur ne supporte pas la lecture de vidéos.
        </video>
    @else
        <li>Vidéo: Vidéo non disponible</li>
    @endif
    <li>Nombre de joueurs: {{ $game['number_gamer'] ?? 'Nombre de joueurs non disponible' }}</li>
    <li>Temps de jeu: {{ $game['playing_time'] ?? 'Temps de jeu non disponible' }}</li>
    <li>Complexité: {{ $game['complexity'] ?? 'Complexité non disponible' }}</li>
    <li>Évaluation: {{ $game['rating'] ?? 'Évaluation non disponible' }}</li>
    <li>Nombre d'évaluations: {{ $game['number_rating'] ?? 'Nombre d\'évaluations non disponible' }}</li>
    <li>Date de publication: {{ $game['published_date'] ?? 'Date de publication non disponible' }}</li>
    <li>Classement: {{ $game['rank'] ?? 'Classement non disponible' }}</li>
</ul>
<form id="deleteForm" method="POST" action="{{ route('deleteGame', ['id' => $game['id']]) }}">
    @csrf
    @method('DELETE')
    <button type="button" onclick="confirmDelete()">Supprimer ce jeu</button>
</form>
</body>
</html>
