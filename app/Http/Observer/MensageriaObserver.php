<?php

namespace App\Http\Observer;

class MensageriaObserver implements CorrigeObserver
{

    function corrige(string $idPergunta, string $idProva)
    {
        echo "mensagem enviada";
    }
}
