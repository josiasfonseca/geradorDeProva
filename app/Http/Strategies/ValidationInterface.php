<?php

namespace App\Http\Strategies;

interface ValidationInterface
{
    public function __contruct(string $value, string $name);

    public function validate():string;
}
