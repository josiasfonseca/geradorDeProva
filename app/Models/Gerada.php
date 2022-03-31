<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Gerada extends Model
{
    use HasCompositePrimaryKey;
    protected $table = "prova_has_perguntas";
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey =  array('prova_idprova', 'perguntas_idperguntas');

}
