<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplicante extends Model
{
    use HasFactory;

    protected $table = "aplicante";
    protected $primaryKey = "idaplicante";
}
