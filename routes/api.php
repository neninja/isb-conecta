<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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

    Route::get('/protected-route', function (Request $request) {
        return [
            'user' => $request->user(),
            'message' => "success"
        ];
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
        return response()->json(Auth::user(), 200);
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
