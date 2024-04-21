<?php

use App\Livewire\Report;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->middleware('guest');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::redirect('/dashboard', 'reports')->name('dashboard');

    Route::prefix('reports')->group(function () {
        Route::get('/', Report\Index::class)->name('reports.index');
        Route::get('/'.Team::ID_RECEPCAO, Report\Recepcao::class)->name('reports.recepcao');
        // Route::get('/{team}', Report\Show::class)->name('reports.show');
    });

    Route::redirect('/settings', 'reports')->name('settings.index');
});
