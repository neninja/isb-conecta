<?php

namespace Database\Factories\Reports;

use App\Models\Report;

trait IsReport
{
    public function configure(): static
    {
        return $this->afterCreating(function ($model) {
            Report::factory()->create([
                'related_type' => $model::class,
                'related_id' => $model->id,
            ]);
        });
    }
}
