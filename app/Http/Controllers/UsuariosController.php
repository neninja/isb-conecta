<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;

use App\Models\User;

use App\Http\Resources\UsuarioResource;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $qtd = $req['qtd'] ?: 2;
        $page = $req['page'] ?: 1;
        $nome = $req['nome'] ?: "";
        $idSetor = $req['setor'] ?: null;

        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });

        // if($buscar){
            // $marcas = Marca::where('nome','=', $buscar)->paginate($qtd);
            // $usuarios = User::with('setores')->get();
            $usuarios = User::whereHas('setores', function ($query) use ($idSetor, $nome){
                // $usuarios = User::with('setores')->get();
                if(!empty($idSetor)){
                    $query->where('setores.id', $idSetor);
                }
                if(!empty($nome)){
                    $query->where('users.name', 'like', '%'.$nome.'%');
                }
            })->get();
        // }else{
            // $marcas = Marca::paginate($qtd);
        // }
        // $marcas = $marcas->appends(Request::capture()->except('page'));
        // return view('marcas.index', compact('marcas'));

        return UsuarioResource::collection(
            $usuarios
        );
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
        //
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
