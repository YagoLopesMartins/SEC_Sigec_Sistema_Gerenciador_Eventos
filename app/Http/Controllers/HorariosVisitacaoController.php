<?php

namespace App\Http\Controllers;

use App\Models\HorariosVisitacao;
use Illuminate\Http\Request;

class HorariosVisitacaoController extends Controller
{
    private $repository;

    public function __construct(
                HorariosVisitacao $horarios_visitacao)
    {
        $this->repository = $horarios_visitacao;
    }

    public function index(){
        $horarios_visitacao = $this->repository->all();

       // $horarios_visitacao = $this->horarios_visitacao->all();
            return view('site.pages.horarios.index', 
                 compact('horarios_visitacao'));  
    }
}
