<?php

namespace App\Http\Observer;

use App\Models\Pergunta;

class CorretorObserver implements CorrigeObserver
{

    function corrige(string $idPergunta, string $idProva)
    {
        $pergunta = Pergunta::where('idperguntas',$idPergunta);
        if ($pergunta->tipo_pergunta == 3){
            $logger = new LoggerObserver();
            $logger->corrige($idPergunta, $idProva);
        }else{
            
        }
    }
}
