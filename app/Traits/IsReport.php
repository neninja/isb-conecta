<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;

trait IsReport
{
    public function report(): MorphOne
    {
        return $this->morphOne($this::class, 'report');
    }
}
