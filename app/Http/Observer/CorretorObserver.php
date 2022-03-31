<?php

namespace App\Http\Observer;

use App\Http\Strategies\Resolve;
use App\Models\Gerada;
use App\Models\Pergunta;

class CorretorObserver implements CorrigeObserver
{

    function corrige(string $idPergunta, string $idProva)
    {
       $pergunta = Pergunta::where('idperguntas',$idPergunta)->first();
        if ($pergunta->tipo_pergunta == 2){
            $logger = new LoggerObserver();
            $mensageria = new MensageriaObserver();
            $mensageria->attach($logger);
            $mensageria->corrige($idPergunta, $idProva);
        }else{
            $gerada = Gerada::where('perguntas_idperguntas',$idPergunta)->where('prova_idprova',$idProva)->first();
            $respostas = json_decode($pergunta->respostas);
            $respostacerta = 0;
            foreach ($respostas as $key => $resp){
                if($resp->value == true)
                    $respostacerta = $key+1;
            }

            $resolve = new Resolve();
            $resolve->construtor($gerada->respostas_dada,$respostacerta);
            if($resolve->valida()){
                $gerada->acertou = true;
            }else{
                $gerada->acertou = false;
            }
            $gerada->save();


        }
        /*
        if ($pergunta->tipo_pergunta == 2){
            $logger = new LoggerObserver();
            $mensageria = new MensageriaObserver();
            $mensageria->attach($logger);
            $mensageria->corrige($idPergunta, $idProva);
        }else{

            $resolve = new Resolve($gerada->respostas_dada,$pergunta->respostas);
            if($resolve->validate()){
                $gerada->acertou = true;
            }else{
                $gerada->acertou = false;
            }
            $gerada->save();

        }*/
    }
}
