<?php

namespace App\Http\Strategies;

class Resolve implements ValidationInterface
{
    protected $value,$name;
    public function __contruct(string $value, string $name)
    {
        $this->value = $value;
        $this->name = $name;

    }

    public function validate(): string
    {

    }
}
