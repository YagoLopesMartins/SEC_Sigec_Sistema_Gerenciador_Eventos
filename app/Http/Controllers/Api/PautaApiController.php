<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PautaResource;
use Illuminate\Http\Request;
use App\Services\PautaService;


class PautaApiController extends Controller
{
    protected $pautaService;

    public function __construct(PautaService $pautaService)
    {
        $this->pautaService = $pautaService;
    }

    public function index(){
        return PautaResource::collection($this->pautaService->getAllPautas()) ;
        // return $this->pautaService->getAllPautas();
    }

    public function per_page(Request $request){

        $per_page = (int) $request->get('per_page', 15);

        $pautas = $this->pautaService->getAllPautasPerPage($per_page);

        return PautaResource::collection($pautas) ;
        // return $this->pautaService->getAllPautas();
    }

    public function show($id){
        if(!$pauta = $this->pautaService->getPautaById($id)){
            return response()->json(['message' => 'Not Found'], 404);
        }

        return new PautaResource($pauta);
    }
}
