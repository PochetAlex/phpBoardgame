<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class JeuxController extends Controller
{
    public function testApi() {
        $jeux = [['id' => 1]];
        return view('testApi', ['jeux' => $jeux]);
    }
}
