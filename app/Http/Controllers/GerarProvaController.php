<?php

namespace App\Http\Controllers;

use App\Models\Aplicante;
use App\Models\Pergunta;
use App\Models\Prova;
use Illuminate\Http\Request;

class GerarProvaController extends Controller
{
    public function gerarProva(Request $request) {
        $aplicante = new Aplicante;
        $aplicante->nome = $request->nome;
        $aplicante->save();
        $aplicante->refresh();
        $prova = new Prova;
        $prova->aplicante_idaplicante = $aplicante->idaplicante;
        $prova->save();
        $perguntas = Pergunta::inRandomOrder()->where('dificuldade',$request->nivel)->limit($request->qntQuestoes)->get();
        return response()->json(["perguntas"=>$perguntas,"aplicante"=>$aplicante,"prova"=>$prova]);
    }
}
