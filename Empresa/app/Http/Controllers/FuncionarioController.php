<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Funcionario;

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
        return View('funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'nome' => 'required|max:100',
                'endereco' => 'required|max:100'
            ],
            [
                'nome.*' => 'Nome é obrigatório de tamanho máximo de 100 caracteres',
                'endereco.required' => 'Endereço é obrigatório',
                'endereco.max' => 'Endereço deve ter tamanho máximo de 100 caracteres'
            ]
        );
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
        return View('funcionario.show')->with('funcionario',Funcionario::find($id));
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
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'nome' => 'required|max:100',
                'endereco' => 'required|max:100'
            ],
            [
                'nome.*' => 'Nome é obrigatório de tamanho máximo de 100 caracteres',
                'endereco.required' => 'Endereço é obrigatório',
                'endereco.max' => 'Endereço deve ter tamanho máximo de 100 caracteres'
            ]
        );
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
}
