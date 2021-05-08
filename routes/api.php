<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\{
    RecepcaoController,
    AtendimentoRecepcaoController,
    UsuariosController,
};

use App\Models\{
    User,
    Setor,
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // return $request->user();
// });


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', function(Request $request){
        Auth::guard('web')->logout();
        return response('Logged out',202);
    });

    Route::get('/authenticated', function (Request $request) {

        // $user = User::find(Auth::id());
        $user = User::with('setores')->where('id', Auth::id())->first();

        $setores = [];

        foreach($user->setores as $setor){
            $setores[] = [
                'id' => $setor->id,
                'nome' => $setor->nome,
            ];
        }

        return [
            // 'user' => $request->user(),
            'user' => [
                'name' => $user->name,
                'setores' => $setores
            ],
            'message' => "success"
        ];
    });

    Route::middleware('has:setor-adm')->group(function () {
        Route::put('/usuarios/activate/{id}', [UsuariosController::class, 'reactivate']);
        Route::resource('/usuarios', UsuariosController::class);
        Route::resource('/recepcao/relatorios', RecepcaoController::class);
        Route::get('/setores', function (Request $request) {
            return Setor::all();
        });
    });

    Route::middleware('has:setor-recepcao')->group(function () {
        Route::resource('/recepcao/atendimentos', AtendimentoRecepcaoController::class);
    });
});

Route::get('/public-route', function(Request $request){
    return true;
});

Route::post('login',array('as'=>'login',function(Request $request){
    $request->validate([
        'email' => ['required'],
        'password' => ['required']
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        // var_dump(User::find(Auth::id())->setores);die;
        return response()->json(
            User::find(Auth::id()), 200
            // Auth::user(), 200
        );
    }

    throw ValidationException::withMessages([
        'email' => ['The provided credentials are incorrect.']
    ]);
}));

Route::post('/token', function (Request $request) {
    $request->validate([
        'email' => ['required'],
        'password' => ['required']
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        // return response()->json(Auth::user(), 200);

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken("AAA");
        return ['token' => $token->plainTextToken];
    }

    throw ValidationException::withMessages([
        'email' => ['The provided credentials are incorrect.']
    ]);
});
