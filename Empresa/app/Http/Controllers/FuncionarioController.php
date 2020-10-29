<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Funcionario;
use App\Http\Requests\FuncionarioRequest;

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
        return View('funcionario.show')->with('funcionario',$funcionario)->with('proj',$projetos);
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

    public function documento($id)
    {
        return View('funcionario.documento')->with('id',$id);
    }

    public function documentoGravar(Request $request)
    {
        $this->validate($request,
            [
                'funcionario_id' => 'required|exists:funcionarios,id',
                'arquivo' => 'required|file|max:512|mimes:pdf',
            ],
            [
                'funcionario_id.*' => 'funcionarios não localizado',
                'arquivo.*' => 'Arquivo PDF de no máximo 512 bytes',
            ]);
        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
            $nomearq = uniqid("XYZ").'.'.$request->file('arquivo')->extension();

            // grava arquivo na pasta storage/app/documentos
            $request->file('arquivo')->storeAs('documentos',$nomearq);

            \App\Documento::create(['nomeOriginal'=>$request->file('arquivo')->getClientOriginalName(),'nomeArmazenamento'=>$nomearq,'funcionario_id'=>$request->input('funcionario_id')]);
        }
        return redirect('/funcionario');
    }

}
