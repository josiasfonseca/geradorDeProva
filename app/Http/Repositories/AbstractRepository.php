<?php

namespace App\Http\Repositories;

abstract class AbstractRepository
{
    protected $model;
    public function __contruct(){
        $this->model = $this->resolveModel();
    }
    protected function resolveModel(){
        return app($this->model);
    }
    public function retornoLimitado($qtd,$nv){
        return $this->model::inRandomOrder()->where('dificuldade',$nv)->limit($qtd)->get();
    }
}
