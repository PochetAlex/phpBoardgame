<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JeuxController extends Controller
{
    public function testApi() {

        $res = http::get('http://localhost:8080/api/board-games');
        return view('testApi', ['jeux' => $res->json()]);
    }
}
