<?php

namespace App\Http\Strategies;

interface ValidationInterface
{
    public function __contruct(string $respostadada, string $respostacorreta);

    public function validate():string;
}
