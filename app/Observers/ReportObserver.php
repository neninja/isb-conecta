<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReportObserver
{
    public function created(User $user): void
    {
        if (Auth::check()) {
            $user->forceFill([
                'team_id' => user()->current_team_id,
            ])->save();
        }
    }
}
