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
        }catch (\Exception $e){
            return response()->json(["erro"=>$e]);
        }
    }

    public function validaProva(Request $request){

    }
    public function salvaProva(Request $request){
        $perguntas = json_decode($request->perguntas);
        $respostas = json_encode($request->respostas);
        foreach ($perguntas as $pergunta){
            foreach ($respostas as $resposta){
                if ($pergunta->idperguntas == $resposta->idresposta){
                    $gerada = new Gerada();
                    $gerada->prova_idprova = $request->prova;
                    $gerada->perguntas_idperguntas = $pergunta->idperguntas;
                    $gerada->respostas_dadas = $resposta->respostas;
                    $gerada->save();
                }
            }
        }


    }
}
