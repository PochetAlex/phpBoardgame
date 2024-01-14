<x-layout :titre="$titre">
    <h1 class="text-2xl font-bold mb-4">{{$titre}}</h1>
    <form action="{{ route('games.update', $game['id']) }}" method="POST" class="max-w-md mx-auto">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-semibold text-gray-600">*Nom du jeu :</label>
            <input type="text" id="name" name="name" value="{{ $game['name'] }}"
                   class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-semibold text-gray-600">Prix :</label>
            <input type="text" id="price" name="price" value="{{ $game['price'] }}"
                   class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="number_gamer" class="block text-sm font-semibold text-gray-600">Nombre de joueurs :</label>
            <input type="text" id="number_gamer" name="number_gamer" value="{{ $game['number_gamer'] }}"
                   class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="playing_time" class="block text-sm font-semibold text-gray-600">Temps de jeu :</label>
            <input type="text" id="playing_time" name="playing_time" value="{{ $game['playing_time'] }}"
                   class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="complexity" class="block text-sm font-semibold text-gray-600">Complexité :</label>
            <input type="text" id="complexity" name="complexity" value="{{ $game['complexity'] }}"
                   class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="category" class="block text-sm font-semibold text-gray-600">Catégorie :</label>
            <input type="text" id="category" name="category" value="{{ $game['category'] }}"
                   class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="published_date" class="block text-sm font-semibold text-gray-600">Date de publication :</label>
            <input type="text" id="published_date" name="published_date" value="{{ $game['published_date'] }}"
                   class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-semibold text-gray-600">*Description :</label>
            <textarea id="description" name="description" rows="4" cols="50"
                      class="w-full border border-gray-300 rounded-md p-2">{{ $game['description'] }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Modifier le jeu</button>
    </form>
</x-layout>
