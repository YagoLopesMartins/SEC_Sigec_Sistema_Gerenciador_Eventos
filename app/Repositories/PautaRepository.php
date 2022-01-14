<?php

namespace App\Repositories;

use App\Models\Pauta;
use App\Repositories\Contracts\PautaRepositoryInterface;

class PautaRepository implements PautaRepositoryInterface{

    protected $entity;

    public function __construct(Pauta $pauta)
    {
        $this->entity = $pauta;
    }

    public function getAllPautas(){
        return $this->entity->all();
    }

    public function getAllPautasPerPage($per_page){
        return $this->entity->paginate($per_page);
    }

    public function getPautaById(int $id){
        return $this->entity->where('pauta_id', $id)->first(); 
    }
}