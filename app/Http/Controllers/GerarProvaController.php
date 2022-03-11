<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GerarProvaController extends Controller
{
    public function gerarProva(Request $request) {
        dd($request->all());
    }
}
