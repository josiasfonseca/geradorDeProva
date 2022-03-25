<?php

namespace App\Http\Strategies;

class Resolve implements ValidationInterface
{
    protected $value,$name;
    public function __contruct(string $value, string $name)
    {
        $this->value = $value;
        $this->name = $name;
        // TODO: Implement __contruct() method.
    }

    public function validate(): string
    {
        // TODO: Implement validate() method.
    }
}
