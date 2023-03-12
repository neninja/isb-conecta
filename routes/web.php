<?php

use App\Http\Controllers\Web\GetDepartmentReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/swagger', function () {
    return view('swagger');
});

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('dashboard');
    }

    return Inertia::render('Welcome/index');
})->name('login');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/reports/{department}', GetDepartmentReport::class);

require __DIR__.'/auth.php';
