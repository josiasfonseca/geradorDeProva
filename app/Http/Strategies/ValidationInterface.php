<?php

namespace App\Http\Strategies;

use phpDocumentor\Reflection\Types\Boolean;

interface ValidationInterface
{
    public function __contruct(string $respostadada, string $respostacorreta);

    public function validate():Boolean;
}
