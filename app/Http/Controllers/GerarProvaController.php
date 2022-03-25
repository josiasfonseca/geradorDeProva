<?php

namespace App\Http\Controllers;

use App\Models\Aplicante;
use App\Models\Pergunta;
use App\Models\Prova;
use Illuminate\Http\Request;
use App\Http\Repositories\PeguntasRepository;
class GerarProvaController extends Controller
{
    public function gerarProva(Request $request) {
        try {


        $aplicante = new Aplicante;
        $aplicante->nome = $request->nome;
        $aplicante->save();
        $aplicante->refresh();
        $prova = new Prova;
        $prova->aplicante_idaplicante = $aplicante->idaplicante;
        $prova->save();
        $model = new PeguntasRepository;
        $perguntas = $model->retornoLimitado($request->qntQuestoes,$request->nivel);
        return response()->json(["perguntas"=>$perguntas,"aplicante"=>$aplicante,"prova"=>$prova]);
        }catch (Exception $e){
            return response()->json(["erro"=>$e]);
        }
    }

    public function validaProva(Request $request){
        
    }
}
