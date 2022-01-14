<?php

namespace App\Repositories\Contracts;

interface PautaRepositoryInterface 
{
    public function getAllPautas();
    public function getAllPautasPerPage(int $per_page);
    public function getPautaById(int $id);
}