<?php

namespace App\Services;

use App\Models\Pauta;
use App\Repositories\Contracts\PautaRepositoryInterface;


class PautaService {

    private $repository;

    public function __construct(PautaRepositoryInterface $repository){
        $this->repository = $repository;
    }
    public function getAllPautas(){
        return $this->repository->getAllPautas();
    }
    public function getAllPautasPerPage(int $per_page){
        return $this->repository->getAllPautasPerPage($per_page);
    }
    public function getPautaById(int $id){
        return $this->repository->getPautaById($id);
    }
}
