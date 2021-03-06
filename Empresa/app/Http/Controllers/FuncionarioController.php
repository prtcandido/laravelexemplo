<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Funcionario;  // referencia o model Funcio´nario
use App\Departamento;

class FuncionarioController extends Controller
{
    // Lista funcionários cadastrados
    public function index()
    {
        // busca dois usuários por vez no BD
        $funcionarios = Funcionario::paginate(2);
        // Aciona View, passando a ela coleção dos funcionários obtidos no BD   
        return View('funcionario.index')->with('funcionarios',$funcionarios); 
    }

    // Aciona a view que envia ao usuário o formulário para cadastro ne novo funcionário
    public function create()
    {
        return View('funcionario.create')->with('cDepartamentos',Departamento::all());
    }

    // Valida os dados digitados pelo usuário no formulário e, se corretos, cria novo funcionário no BD
    // Dados digitados são obtidos no parâmetro objeto $request 
    public function store(Request $request)
    {
        // Valida os dados em $request
        $this->validate($request,
            [
                'nome' => 'required|max:100',    // nome obrigatório e no máximo 100 caracteres
                'endereco' => 'required|max:100', // endereço obrigatório e no máximo 100 caracteres
                'departamento_id' => 'required|exists:departamentos,id',
            ],
            // mensagens de erro quando a validação falha.
            [
                'nome.*' => 'Nome é obrigatório de tamanho máximo de 100 caracteres',
                'endereco.required' => 'Endereço é obrigatório',
                'endereco.max' => 'Endereço deve ter tamanho máximo de 100 caracteres',
                'departamento_id' => 'Departamento inválido',
            ]
        );
        // Cria funcionário no BD
        Funcionario::create($request->all()); // ['nome'=>'Ana Lucia','endereco'=>'rua K,33', 'departamento_id'=>2]
        // Redireciona para view que lista os funcionários cadastrados
        return redirect('/funcionario');
    }

    // Aciona view que apresenta os dados do funcionário conforme $id
    public function show($id)
    {
        return View('funcionario.show')->with('funcionario',Funcionario::find($id));
    }

    // Aciona view que envia ao usuário formulário preenchido com os dados do funcionário conforme $id
    public function edit($id)
    {
        return View('funcionario.edit')->with('funcionario',Funcionario::find($id));   
    }

    // Valida os dados alrerados pelo usuário (edição) e, se ok, atualiza funcionário no BD 
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
        $funcionario = Funcionario::find($id);  // recupera funcionário do BD
        $funcionario->update($request->all());  // atualiza (grava) novos dados do funcionário
        return redirect('/funcionario');
    }

    // Exclui funcionário conforme $id
    public function destroy($id)
    {
        Funcionario::destroy($id);
        return redirect('/funcionario');
    }
}
