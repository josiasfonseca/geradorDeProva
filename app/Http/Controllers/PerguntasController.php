<?php

namespace App\Http\Controllers;

use App\Models\Pergunta;
use Illuminate\Http\Request;

class PerguntasController extends Controller
{
    public function store(Request $request) {
        try {
            $pergunta = new Pergunta();
            $pergunta->pergunta = $request->pergunta;
            $pergunta->dificuldade = $request->nivel;
            $pergunta->respostas = $request->respostas;
            $pergunta->rotulo = $request->rotulo;
            $pergunta->tipo_pergunta = $request->tipoPergunta;
            $pergunta->save();
            return response()->json(["msg"=>"cadastrado com sucesso"]);
        }catch (\Exception $e) {
            return response()->json(["msg"=> $e ]);
        }
    }


}
