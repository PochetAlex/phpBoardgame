<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JeuxController extends Controller
{
    public function vue_tableau_jeux() {
        $res = http::get('http://localhost:8080/api/board-games')->json();
        return view('index', ['jeux' => $res]);
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
        return http::get('http://localhost:8080/api/board-games')->json()[$id];
    }
}
