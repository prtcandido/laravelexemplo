<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Funcionario;
use App\Http\Requests\FuncionarioRequest;
use App\Http\Resources\Funcionario as FuncionarioResource;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::paginate(2); // $funcionarios = Funcionario::all();
        return View('funcionario.index')->with('funcionarios',$funcionarios); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = \App\Departamento::all();
        return View('funcionario.create')->with('deptos',$departamentos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioRequest $request)
    {
        Funcionario::create($request->all());
        return redirect('/funcionario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionario::find($id);
        $projetos = $funcionario->projetos()->get();
        return View('funcionario.show')->with('funcionario',$funcionario)->with('proj',$projetos)->with('documentos',$funcionario->documentos()->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return View('funcionario.edit')->with('funcionario',Funcionario::find($id));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuncionarioRequest $request, $id)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->update($request->all());
        return redirect('/funcionario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Funcionario::destroy($id);
        return redirect('/funcionario');
    }

    // Conforme rota em web.php, é acionado por URL como a exemplificada abaixo:
    // localhost:8000/funcionario/34/documento
    // Onde 34 é o id do funcionário para o qual um documento está sendo carregado
    public function documento($id)
    {
        // Aciona View que gera o formuário usado para seleção do arquivo PDF
        return View('funcionario.documento')->with('id',$id);
    }

    // Conforme rota em web.php, é acionado por post de formulário.
    // Dados do formulário, tais como o arquivo sendo uploaded estão em $request
    public function documentoGravar(Request $request)
    {
        // Nestas validações,é verificado se funcionario_id em funcionarios.id
        // e é verificado se arquivo existe, é PDF e de tamanho máximo de 512KB
        $this->validate($request,
            [
                'funcionario_id' => 'required|exists:funcionarios,id',
                'arquivo' => 'required|file|max:512|mimes:pdf',
            ],
            [
                'funcionario_id.*' => 'funcionarios não localizado',
                'arquivo.*' => 'Arquivo PDF de no máximo 512 bytes',
            ]);
        // Verifica se o arquivo existe e é válido (redundante com as validação)
        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            // Cria nome interno para o arquivo gerando um identificador único (uniqid) e com a mesma extensão do arquivo original
            $nomearq = uniqid("XYZ").'.'.$request->file('arquivo')->extension();

            // Grava arquivo na pasta storage/app/documentos
            $request->file('arquivo')->storeAs('documentos',$nomearq);

            // Grava novo objeto Documento no BD
            \App\Documento::create(['nomeOriginal'=>$request->file('arquivo')->getClientOriginalName(),'nomeArmazenamento'=>$nomearq,'funcionario_id'=>$request->input('funcionario_id')]);
        }
        return redirect('/funcionario'); // Volta para listagem de usuários (index)
    }

    // API

    public function apiFind(Funcionario $funcionario) {
        // FuncionarioResource é o apelido de App\Http\Resouces\Funcionario
        // Cuja finalidade é converter um model para Json
        // O model a ser convertido é passado no construtor 
        // Se o model não existir, retorna automaticamente statuscode 404 not found
        return new FuncionarioResource($funcionario);
    }

    public function apiAll() {
        // return coleção de todos os funcionários convertida para Json
        return FuncionarioResource::collection(Funcionario::all());   
    }

    public function apiStore(Request $request) {
        try{
            $funcionario = Funcionario::create($request->all());
            return response()->json($funcionario,201); // 201 - model criado
        }
        catch (\Exception $ex)
        {
            return response()->json(null,400); // 400 - bad request - dados inválidos, por exemplo, violação de chave.
        }
    }

    public function apiUpdate(Request $request, Funcionario $funcionario) { // 404 se model não existe
        try{
            $funcionario->update($request->all());
            return response()->json($funcionario,200); // 200 - atualizado
        }
        catch (\Exception $ex)
        {
            return response()->json(null,400); // 400 - bad request - dados inválidos, por exemplo, violação de chave.
        }
    }

    public function apiDelete(Funcionario $funcionario) { // 404 se model não existe
        try{
            $funcionario->delete();
            return response()->json(null,204); // funcionou - sem retorno
        }
        catch (\Exception $ex)
        {
            return response()->json(null,400); // bad request - pode falhar, por exemplo, devido a chave estrangeira
        }
    }

}
