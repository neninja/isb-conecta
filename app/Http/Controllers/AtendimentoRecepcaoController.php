<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Core\UseCases\CadastroAtendimentoRecepcao\CadastroAtendimentoRecepcao;

class AtendimentoRecepcaoController extends Controller
{
    public function __construct(
        CadastroAtendimentoRecepcao $cadastroAtendimentoRecepcao
    ) {
        $this->cadastroAtendimentoRecepcao = $cadastroAtendimentoRecepcao;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $s = $this->cadastroAtendimentoRecepcao;

        $dto = new \Core\UseCases\CadastroAtendimentoRecepcao\CadastroAtendimentoRecepcaoDTO();
        $dto->idUsuario = Auth::user()->id;
        $dto->data = date_create();
        $dto->idLocalAtendimento = 1;
        $dto->nomePessoaAtendida = "AAA";
        $dto->contato = "51987654321";
        $dto->relato = "aaa";
        $s->execute($dto);

        return [];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
