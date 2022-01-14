<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateVisitacao;
use App\Models\Espaco;
use App\Models\Visitacao;
use Carbon\Carbon;
use Database\Seeders\EspacoSeeder;
use Illuminate\Http\Request;

class VisitacaoController extends Controller
{

    protected $repository, $espacos;

    public function __construct(Visitacao $visitacao, Espaco $espacos)
    {
        $this->repository = $visitacao;
        $this->espacos = $espacos;
    }

    public function index()
    {
        $visitacao = $this->repository
            ->where('estado','=','Ativo')
            ->latest()  
            ->paginate(); // default

        return view('site.pages.visitacao.index', [
            'visitacao' => $visitacao
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $espacos = $this->espacos->all();
    
        return view('site.pages.visitacao.create', [
                    'espacos' => $espacos, 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateVisitacao $request)
    {
        $data_hora_atual = Carbon::now();

        // $data_formatada = Carbon::make($data_hora_atual)->format('Y-m-d');
        $ano_atual =        $data_hora_atual->year;
        $mes_atual =        $data_hora_atual->month;
        $dia_atual =        $data_hora_atual->day;
        $hora_atual =       $data_hora_atual->hour;
        $minutos_atual =    $data_hora_atual->minute;
        $segundos_atual =   $data_hora_atual->second;

        // 20-10-2021_14:00:00_
        $data_hora = $dia_atual.'-'.$mes_atual.'-'.$ano_atual.'_'.$hora_atual.':'.$minutos_atual.':'.$segundos_atual.'_';

        $data = $request->all();
        $dados = [];

        $data['anexos_arquivo'] = json_encode($dados);
        
        // $this->repository->create($request->all());
        $this->repository->create($data);
        return redirect('visitacao')
        ->withSuccess('Pauta cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visitacao = $this->repository->where('visitante_espaco_id', $id)->first();

        if (!$visitacao)
            return redirect()->back();

        return view('site.pages.visitacao.show', [
            'visitacao' => $visitacao
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias                 = $this->categorias->all();
        $subCategorias              = $this->subCategorias->all();
        $orgaos                     = $this->orgaos->all();
        $diretorias                 = $this->diretorias->all();
        $gerencias                  = $this->gerencias->all();
        $usuarios                   = $this->usuarios->all();
        $responsavelEventos         = $this->responsavelEventos->all();
        $espacos                    = $this->espacos->all();
        $classificacaoIndicativas   = $this->classificacaoIndicativas->all();

        $users                      = $this->users->all();

        $pauta = $this->repository->where('visitante_espaco_id', $id)->first();

        $formularioCreate = false;

        if (!$pauta)
            return redirect()->back();

        return view('site.pages.visitacao.edit', 
            compact('pauta','categorias','subCategorias','orgaos','diretorias','gerencias','usuarios',
                    'responsavelEventos','espacos','classificacaoIndicativas', 'formularioCreate', 'users')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateVisitacao $request, $id)
    {
        $pauta = $this->repository->where('visitante_espaco_id', $id)->first();
        $imagem_path = app_path("imagens/visitacao/{$pauta->imagem_arquivo}");

        if (!$pauta)
            return redirect()->back();
        
        $data = $request->all();
        $dados = [];

        $data['anexos_arquivo'] = json_encode($dados);
        $pauta->update($data);

        return redirect('visitacao')
            ->withSuccess('Pauta atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pauta = $this->repository
                        // ->with('details')
                        ->where('visitante_espaco_id', $id)
                        ->first();

        if (!$pauta)
            return redirect()->back();
        
        $pauta->estado = 'Inativo';
        $pauta->update();

        return redirect('visitacao');
    }
    public function search(Request $request)
    {
        $filters = $request->except('_token');
        // $filters = $request->only('filter');

        $visitacao = $this->repository->search($request->filter);

        return view('site.pages.visitacao.index', [
            'visitacao' => $visitacao,
            'filters' => $filters,
        ]);
    }
}
