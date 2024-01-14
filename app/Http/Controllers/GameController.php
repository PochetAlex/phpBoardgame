<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function index() {
        $res = http::get('http://localhost:8080/api/board-games')->json();
        return view('games.index', ['games' => $res]);
    }

    public function create() {
        return view('games.create', ['titre' => "Création d'un jeu"]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'number_gamer' => 'required',
                'playing_time' => 'required',
                'complexity' => 'required',
                'category' => 'required',
                'published_date' => 'required',
            ],
            [
                'name.required' => 'Le nom du jeu est obligatoire.',
                'description.required' => 'La description du jeu est obligatoire.',
                'price.required' => 'Le prix du jeu est obligatoire.',
                'number_gamer.required' => 'Le nombre de joueurs du jeu est obligatoire.',
                'playing_time.required' => 'Le temps de jeu du jeu est obligatoire.',
                'complexity.required' => 'La complexité du jeu est obligatoire.',
                'category.required' => 'La catégorie du jeu est obligatoire.',
                'published_date.required' => 'La date de publication du jeu est obligatoire.',
            ]
        );

        $newGame = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'number_gamer' => $request->input('number_gamer'),
            'playing_time' => $request->input('playing_time'),
            'complexity' => $request->input('complexity'),
            'rating' => $request->input('rating'),
            'category' => $request->input('category'),
            'published_date' => $request->input('published_date'),
        ];

        $response = Http::post('http://localhost:8080/api/board-games', $newGame);

        if ($response->successful()) {
            return redirect()->route('games.index')->with('success', 'Le jeu a été ajouté avec succès à l\'API.');
        } else {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'ajout du jeu à l\'API.');
        }
    }

    public function show(Request $request, $id)
    {
        $game = $this->getJeuAvecId($id);

        if (!$game) {
            return "Jeu non trouvé.";
        }

        $titre = $request->get('action', 'show') == 'show' ? "Détails d'un jeu" : "Suppression d'un jeu";
        return view('games.show', ['titre' => $titre, 'game' => $game,
            'action' => $request->get('action', 'show')]);
    }

    public function edit(string $id) {
        $game = $this->getJeuAvecId($id);
        return view('games.edit', ['titre' => "Modification d'un jeu", 'game' => $game]);
    }

    public function update(Request $request, string $id) {
        if ($request->input('action', 'valide') == "annule") {
            return redirect()->route('games.index', ['titre' => "Liste des jeux"])
                ->with('type', 'warning')
                ->with('msg', 'Modification annulée');
        }

        $this->validate(
            $request,
            [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'number_gamer' => 'required',
                'playing_time' => 'required',
                'complexity' => 'required',
                'category' => 'required',
                'published_date' => 'required',
            ],
            [
                'name.required' => 'Le nom du jeu est obligatoire.',
                'description.required' => 'La description du jeu est obligatoire.',
                'price.required' => 'Le prix du jeu est obligatoire.',
                'number_gamer.required' => 'Le nombre de joueurs du jeu est obligatoire.',
                'playing_time.required' => 'Le temps de jeu du jeu est obligatoire.',
                'complexity.required' => 'La complexité du jeu est obligatoire.',
                'category.required' => 'La catégorie du jeu est obligatoire.',
                'published_date.required' => 'La date de publication du jeu est obligatoire.',
            ]
        );

        $game = $this->getJeuAvecId($id);

        $game['name'] = $request->input('name');
        $game['description'] = $request->input('description');
        $game['price'] = $request->input('price');
        $game['number_gamer'] = $request->input('number_gamer');
        $game['playing_time'] = $request->input('playing_time');
        $game['complexity'] = $request->input('complexity');
        $game['rating'] = $request->input('rating');
        $game['category'] = $request->input('category');
        $game['published_date'] = $request->input('published_date');

        $response = Http::put("http://localhost:8080/api/board-games/{$id}", $game);

        if ($response->successful()) {
            return redirect()->route('games.index')->with('success', 'Le jeu a été modifié avec succès.');
        } else {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification du jeu.');
        }
    }

    public function destroy(Request $request, string $id)
    {
        $response = Http::delete("http://localhost:8080/api/board-games/{$id}");
        if ($request->delete == 'valide') {
            if ($response->successful()) {
                return redirect()->route('games.index')
                    ->with('success', 'Le jeu a été supprimé avec succès.');
            } else {
                return redirect()->route('games.index')
                    ->with('error', 'Une erreur est survenue lors de la suppression du jeu.');
            }
        } else {
            return redirect()->route('games.index')
                ->with('warning', 'Suppression du jeu annulée.');
        }
    }

    public function getnomJeu(){
        $all = http::get('http://localhost:8080/api/board-games')->json();
        $res = array();
        foreach($all as $jeu){
            array_push($res,$jeu["name"]);
        }
        return $res;
    }

    public function getNombreJeu(){
        return count(http::get('http://localhost:8080/api/board-games')->json());
    }

    public function getJeuAvecId(int $id){
        $boardGamesData = http::get('http://localhost:8080/api/board-games')->json();

        foreach ($boardGamesData as $boardGame) {
            if ($boardGame["id"] == $id) {
                return $boardGame;
            }
        }
        return null;
    }
}
