<?php

namespace App\Repositories\Eloquent;

use App\Indicador;
use App\Repositories\AbstractRepository;
use App\Repositories\DAO\IndicadorRepositoryInterface;

class IndicadorRepository extends AbstractRepository implements IndicadorRepositoryInterface
{
    public function __construct(Indicador $modelo)
    {
        $this->modelo = $modelo;
    }

}