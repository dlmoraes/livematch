<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnoMes extends Model
{
    protected $table = 'ano_mes';

    protected $fillable = ['ano_id','mes_id'];

}
