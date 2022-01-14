<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePauta;
use App\Models\ {
    Categoria,
    ClassificacaoIndicativa,
    Diretoria,
    Espaco,
    Gerencia,
    Orgao,
    Pauta,
    ResponsavelEvento,
    SubCategoria,
    User,
    Usuario,
};

use Carbon\Carbon;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PautaController extends Controller
{
    private $repository, $categorias, $subCategorias, $orgaos, $diretorias, $gerencias,  
            $usuarios, $responsavelEventos, $espacos, $classificacaoIndicativas, $users;
    
    public function __construct(Categoria $categorias, SubCategoria $subCategorias, Orgao $orgaos, Diretoria $diretorias,
                                Gerencia $gerencias, Usuario $usuarios, ResponsavelEvento $responsavelEventos, Espaco $espacos,
                                ClassificacaoIndicativa $classificacaoIndicativas, Pauta $pautas, User $users)
    {
       $this->categorias                = $categorias;
       $this->subCategorias             = $subCategorias;
       $this->orgaos                    = $orgaos;
       $this->diretorias                = $diretorias;
       $this->gerencias                 = $gerencias;
       $this->usuarios                  = $usuarios;
       $this->responsavelEventos        = $responsavelEventos;
       $this->espacos                   = $espacos;
       $this->classificacaoIndicativas  = $classificacaoIndicativas;
       $this->repository                = $pautas;
       $this->users                     = $users;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $this->subCategorias->subcategoriasFiltroPorCategoria->all();

        // $pautas = $this->repository->all();
        // $pautas = $this->repository->orderBy('id', 'DESC')->paginate(1);
        // $pautas = $this->repository->paginate(1);
        // // dd($diretorias);
        $pautas = $this->repository
            ->where('pauta_estado','=','Ativo')
            ->latest()  
            ->paginate(); // default

        return view('admin.pages.pautas.index', [
            'pautas' => $pautas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        
        $formularioCreate = true;

        return view('admin.pages.pautas.create', [
                    'categorias'                => $categorias, 
                    'subCategorias'             => $subCategorias, 
                    'orgaos'                    => $orgaos,
                    'diretorias'                => $diretorias, 
                    'gerencias'                 => $gerencias, 
                    'usuarios'                  => $usuarios, 
                    'responsavelEventos'        => $responsavelEventos, 
                    'espacos'                   => $espacos, 
                    'classificacaoIndicativas'  => $classificacaoIndicativas,
                    'users'                     => $users, 
                    'formularioCreate'          => $formularioCreate,
        ]);
    }

    function fetch(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('sub_categorias')
        ->where($select, $value)
        ->get();

        $output = '<option value="">
                    Select '.ucfirst($dependent).
                '</option>';

        foreach($data as $row){
            $output .= '<option value="'.
                $row->$dependent.'">
                '.$row->$dependent.'</option>';
        }

        echo $output; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePauta $request)
    {
        $data_hora_atual = Carbon::now();
        //dd($data_hora_atual);
        
        // $data_formatada = Carbon::make($data_hora_atual)->format('Y-m-d');
        $ano_atual =        $data_hora_atual->year;
        $mes_atual =        $data_hora_atual->month;
        $dia_atual =        $data_hora_atual->day;
        $hora_atual =       $data_hora_atual->hour;
        $minutos_atual =    $data_hora_atual->minute;
        $segundos_atual =   $data_hora_atual->second;

        // 20-10-2021_14:00:00_
        $data_hora = $dia_atual.'-'.$mes_atual.'-'.$ano_atual.'_'.$hora_atual.':'.$minutos_atual.':'.$segundos_atual.'_';

        //dd($data_hora);
       
        // $this->validate($request, [
        //     'anexos_arquivo' => 'required',
        //     'anexos_arquivo.*' => 'mimes:doc,pdf,docx,zip'
        // ]);

        // dd($request->all()); // dd($request);
        $data = $request->all();
        $dados = [];

        if($request->hasFile('imagem_arquivo') && $request->imagem_arquivo->isValid() ){
            $file = $request->imagem_arquivo;
    		$file->move(public_path().'/imagens/pautas/', $file->getClientOriginalName());
    		$data['imagem_arquivo'] = $file->getClientOriginalName();
        }
        
        // tratar multiplos arquivos
        if($request->hasfile('anexos_arquivo')) {
            foreach($data['anexos_arquivo'] as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/anexos/arquivos/', $name);  
                $dados[] = $name;  
            }
        }
        $data['anexos_arquivo'] = json_encode($dados);
        
        // $this->repository->create($request->all());
        $this->repository->create($data);
        return redirect('pautas')
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
        $pautas = $this->repository->where('pauta_id', $id)->first();

        if (!$pautas)
            return redirect()->back();

        return view('admin.pages.pautas.show', [
            'pautas' => $pautas
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

        $pauta = $this->repository->where('pauta_id', $id)->first();

        $formularioCreate = false;

        if (!$pauta)
            return redirect()->back();

        return view('admin.pages.pautas.edit', 
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
    public function update(StoreUpdatePauta $request, $id)
    {
        $pauta = $this->repository->where('pauta_id', $id)->first();
        $imagem_path = app_path("imagens/pautas/{$pauta->imagem_arquivo}");

        if (!$pauta)
            return redirect()->back();
        
        $data = $request->all();
        $dados = [];

        if($request->hasFile('imagem_arquivo') && $request->imagem_arquivo->isValid() ){
            // if existir uma imagem anterior, deve ser removida
            if(File::exists($imagem_path)){
                    //File::delete($image_path);
                    unlink($imagem_path);
            }
            $file = $request->imagem_arquivo;
            $file->move(public_path().'/imagens/pautas/', $file->getClientOriginalName());
            $data['imagem_arquivo'] = $file->getClientOriginalName();
        }
        // tratar multiplos arquivos
        if($request->hasfile('anexos_arquivo')) {
            foreach($data['anexos_arquivo'] as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/anexos/arquivos/', $name);  
                $dados[] = $name;  
            }
        }
        $data['anexos_arquivo'] = json_encode($dados);
        $pauta->update($data);

        return redirect('pautas')
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
                        ->where('pauta_id', $id)
                        ->first();

        if (!$pauta)
            return redirect()->back();

        // if existir uma imagem anterior, deve ser removida
        // if(File::exists($imagem_path)){
        //     File::delete($image_path);
        //     // dd('passei aqui');
        //     // unlink($imagem_path);
        // }
        if(Storage::exists($pauta->imagem_arquivo)){
            Storage::delete($pauta->imagem_arquivo);
            // dd('passei aqui');
            // unlink($imagem_path);
        }
        
        $pauta->pauta_estado = 'Inativo';
        $pauta->update();

        return redirect('pautas');
    }
    public function search(Request $request)
    {
        $filters = $request->except('_token');
        // $filters = $request->only('filter');

        $pautas = $this->repository->search($request->filter);

        return view('admin.pages.pautas.index', [
            'pautas' => $pautas,
            'filters' => $filters,
        ]);
    }
}
