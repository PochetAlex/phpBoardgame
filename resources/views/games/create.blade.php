<x-layout :titre="$titre">
    <h2 class="text-2xl font-bold mb-4">Ajouter un nouveau jeu</h2>
    <form action="{{ route('games.store') }}" method="POST" class="max-w-md mx-auto">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-semibold text-gray-600">*Nom du jeu :</label>
            <input type="text" id="name" name="name" required
                   class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-semibold text-gray-600">Prix :</label>
            <input type="text" id="price" name="price" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="number_gamer" class="block text-sm font-semibold text-gray-600">Nombre de joueurs :</label>
            <input type="text" id="number_gamer" name="number_gamer"
                   class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="playing_time" class="block text-sm font-semibold text-gray-600">Temps de jeu :</label>
            <input type="text" id="playing_time" name="playing_time"
                   class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="complexity" class="block text-sm font-semibold text-gray-600">Complexité :</label>
            <input type="text" id="complexity" name="complexity"
                   class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="category" class="block text-sm font-semibold text-gray-600">Catégorie :</label>
            <input type="text" id="category" name="category"
                   class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="published_date" class="block text-sm font-semibold text-gray-600">Date de publication :</label>
            <input type="text" id="published_date" name="published_date"
                   class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-semibold text-gray-600">*Description :</label>
            <textarea id="description" name="description" rows="4" cols="50" required
                      class="w-full border border-gray-300 rounded-md p-2"></textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Ajouter le jeu</button>
    </form>
</x-layout>
