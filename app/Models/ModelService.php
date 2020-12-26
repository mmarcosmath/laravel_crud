<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelService extends Model
{
    protected $fillable = ['produto','id_user','desc','nome_cliente','classificacao','situacao'];
    protected $table='services';
}
