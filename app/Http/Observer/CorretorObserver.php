<?php

namespace App\Http\Observer;

use App\Http\Strategies\Resolve;
use App\Models\Gerada;
use App\Models\Pergunta;

class CorretorObserver implements CorrigeObserver
{

    function corrige(string $idPergunta, string $idProva)
    {
        $pergunta = Pergunta::where('idperguntas',$idPergunta);
        if ($pergunta->tipo_pergunta == 3){
            $logger = new LoggerObserver();
            $mensageria = new MensageriaObserver();
            $mensageria->attach($logger);
            $mensageria->corrige($idPergunta, $idProva);
        }else{
            $gerada = Gerada::where('perguntas_idperguntas ',$idPergunta)->where('prova_idprova ',$idProva);
            $resolve = new Resolve($gerada->respostas_dadas,$pergunta->respostas);
            if($resolve->validate()){
                $gerada->acertou = true;
            }else{
                $gerada->acertou = false;
            }
            $gerada->save();

        }
    }
}
