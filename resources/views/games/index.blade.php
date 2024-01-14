<x-layout>
    <h2 class="text-2xl font-bold mb-4">La liste des jeux</h2>

    @if(!empty($games))
        <table class="w-full border border-gray-300">
            <thead>
            <tr class="bg-gray-200">
                <th class="p-2 text-center">ID</th>
                <th class="p-2 text-center">Nom</th>
                <th class="p-2 text-center">Prix</th>
                <th class="p-2 text-center">Nombre de joueurs</th>
                <th class="p-2 text-center">Temps de jeu</th>
                <th class="p-2 text-center">Complexité</th>
                <th class="p-2 text-center">Évaluation</th>
                <th class="p-2 text-center">Catégorie</th>
                <th class="p-2 text-center">Date de publication</th>
                <th class="p-2 text-center">Détails jeu</th>
                <th class="p-2 text-center">Modification</th>
                <th class="p-2 text-center">Suppression</th>
            </tr>
            </thead>
            <tbody>
            @foreach($games as $game)
                <tr class="border-b border-gray-300">
                    <td class="p-2 text-center">{{$game["id"]}}</td>
                    <td class="p-2 text-center">{{$game["name"]}}</td>
                    <td class="p-2 text-center">{{$game["price"]}}</td>
                    <td class="p-2 text-center">{{$game["number_gamer"]}}</td>
                    <td class="p-2 text-center">{{$game["playing_time"]}}</td>
                    <td class="p-2 text-center">{{$game["complexity"]}}</td>
                    <td class="p-2 text-center">{{$game["rating"]}}</td>
                    <td class="p-2 text-center">{{$game["category"]}}</td>
                    <td class="p-2 text-center">{{$game["published_date"]}}</td>
                    <td class="p-2 text-center">
                        <button class="bg-blue-500 text-white px-2 py-1 rounded-md hover:bg-blue-600">
                            <a href="{{route('games.show', ['game'=>$game["id"], 'action' => 'show'])}}">🧾</a>
                        </button>
                    </td>
                    <td class="p-2 text-center">
                        <button class="bg-green-500 text-white px-2 py-1 rounded-md hover:bg-green-600">
                            <a href="{{route('games.edit', ['game'=>$game["id"]])}}">📝</a>
                        </button>
                    </td>
                    <td class="p-2 text-center">
                        <button class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600">
                            <a href="{{route('games.show', ['game'=>$game["id"], 'action' => 'delete'])}}">✖️</a>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-lg text-center">Aucun jeu</h3>
    @endif
</x-layout>
