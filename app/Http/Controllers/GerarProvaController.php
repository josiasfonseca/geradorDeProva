<?php

namespace App\Http\Controllers;

use App\Http\Observer\CorretorObserver;
use App\Http\Observer\LoggerObserver;
use App\Models\Aplicante;
use App\Models\Gerada;
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

        return view('prova', ["perguntas"=> $perguntas,"aplicante"=>$aplicante,"prova"=>$prova]);
        }catch (\Exception $e){
            return response()->json(["erro"=>$e]);
        }
    }


    public function salvaProva(Request $request){

            $perguntas = $request->all();
            unset($perguntas['_token']);
            unset($perguntas['id_prova']);
            foreach ($perguntas as $key => $pergunta) {
                $gerada = new Gerada();
                $gerada->prova_idprova = $request->id_prova;
                $gerada->perguntas_idperguntas = $key;
                $gerada->respostas_dada = $pergunta;
                $gerada->save();
                $corretor = new CorretorObserver();
                $corretor->corrige($key,$request->id_prova);
            }
            //return response()->json(["msg"=>"salvo com sucesso"]);


    }

    public function salvaRespostaEspecifica(Request $request){

        $gerada = Gerada::where('perguntas_idperguntas ',$request->idpergunta)->where('prova_idprova ',$request->idprova);
        $gerada->acertou = $request->acertou;
        $gerada->save();
    }
}
