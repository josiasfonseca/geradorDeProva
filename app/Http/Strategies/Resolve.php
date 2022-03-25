<?php

namespace App\Http\Strategies;

class Resolve implements ValidationInterface
{
    protected $respostadada,$respostacorreta;

    public function __contruct(string $respostadada, string $respostacorreta)
    {
        $this->respostadada = $respostadada;
        $this->respostacorreta =$respostacorreta;
    }

    public function validate(): boolean
    {
        if ($this->$repostadada == $this->$respostacorreta){
            return true;
        }else{
            return false;
        }
    }
}
