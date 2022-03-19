<?php

namespace App\Http\Controllers;

use App\Models\Pergunta;
use Illuminate\Http\Request;

class PerguntasController extends Controller
{
    public function gerarProva(Request $request) {
        dd($request->all());
            //return response()->json(["perguntas"=>$perguntas,"aplicante"=>$aplicante,"prova"=>$prova]);
    }
}
