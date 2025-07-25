<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
    'cpf',
    'instituicaoFinanceira',
    'modalidadeCredito',
    'qtdeParcelaMinima',
    'qtdeParcelaMaxima',
    'valorMin',
    'valorMax',
    'taxaJuros',
];
}
