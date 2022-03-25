<?php

namespace App\Http\Observer;

class LoggerObserver implements CorrigeObserver
{

    function corrige(string $idPergunta, string $idProva)
    {
        echo "Execicio "+$idPergunta+" Da prova "+$idProva+" Corrigido";
    }
}
