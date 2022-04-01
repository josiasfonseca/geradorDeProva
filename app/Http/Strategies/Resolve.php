<?php

namespace App\Http\Strategies;

class Resolve implements ValidationInterface
{
    protected $respostadada,$respostacorreta;

    public function construtor(string $respostadada, string $respostacorreta)
    {
        $this->respostadada = $respostadada;
        $this->respostacorreta = $respostacorreta;
    }

    public function valida(): bool
    {

        if ($this->respostadada == $this->respostacorreta){
            return true;
        }
        return false;
    }
}
