<?php

use App\Livewire\Reports;
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
        Route::get('/', Reports\Index::class)->name('reports.index');
        Route::get('/{team}', Reports\SearchFromTeam::class)->name('reports.team');

        Route::get('/{report}/create', Reports\Create::class)
            ->whereIn('report', collect(Team::allReports())->map(fn ($r) => kebabClassBaseName($r))->toArray())
            ->name('reports.create');
    });

    Route::redirect('/settings', 'reports')->name('settings.index');
});
