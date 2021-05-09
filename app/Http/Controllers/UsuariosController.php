<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;

use App\Models\User;

use App\Http\Resources\UsuarioResource;

use Core\UseCases\CadastroUsuario\CadastroUsuario;

class UsuariosController extends Controller
{
    public function __construct(
        CadastroUsuario $cadastroUsuario
    ) {
        $this->cadastroUsuario = $cadastroUsuario;
    }

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
    public function store(Request $req)
    {
        $s = $this->cadastroUsuario;

        $dto = new \Core\UseCases\CadastroUsuario\CadastroUsuarioDTO();
        $dto->nome = $req['nome'];
        $dto->senha = $req['senha'];
        $dto->email = $req['email'];
        $dto->idSetor = $req['setor'];

        $s->execute($dto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $usuarios = User::with('setores')->where('id', $id)->first();

        // $usuarios = User::find(1)->with(['setores' => function ($query) use ($id){
            // $query->where('users.id', $id);
        // }]);

        //$usuarios = User::whereHas('setores', function ($query) use ($id){
        //    // $query->where('users.id', $id)->first();
        //    $query->where('users.id', $id);
        //})->get();

        $usuarios = User::with('setores')->where('users.id', $id)->first();

        return new UsuarioResource(
            $usuarios
        );
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
    public function update(Request $req, $id)
    {
        $s = $this->cadastroUsuario;

        $dto = new \Core\UseCases\CadastroUsuario\CadastroUsuarioDTO();
        $dto->id = $id;
        $dto->nome = $req['nome'];
        $dto->senha = $req['senha'];
        $dto->email = $req['email'];
        $dto->idSetor = $req['setor'];

        $s->execute($dto);
    }

    public function reactivate($id)
    {
        $user = User::find($id);
        $user->active = true;
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->active = false;
        $user->save();
    }
}
