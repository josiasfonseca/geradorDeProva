<?php

namespace App\Http\Strategies;



interface ValidationInterface
{
    public function construtor(string $respostadada, string $respostacorreta);

    public function valida():bool;
}
