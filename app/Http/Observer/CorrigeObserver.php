<?php

namespace App\Http\Observer;

interface CorrigeObserver
{
    function corrige(string $idPergunta, string $idProva);
}
