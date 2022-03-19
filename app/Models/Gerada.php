<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerada extends Model
{
    use HasFactory;
    protected $table = "prova_has_perguntas";
    public $timestamps = false;
    protected $attributes = [
        'respostas_dadas' => "{}",
        'acertos' => "{}",
    ];

}
