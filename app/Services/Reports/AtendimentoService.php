<?php

namespace App\Services\Reports;

use App\Enums\Via;
use App\Exceptions\ReportUnavailableException;
use App\Models\Report;
use App\Models\Reports\Atendimento;
use App\Models\Team;
use App\Models\User;
use Carbon\CarbonInterface;

class AtendimentoService
{
    public readonly User $user;

    public readonly Report $report;

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function create(
        CarbonInterface $date,
        Via $via,
        string $authorName,
        string $authorContact,
        string $description,
    ): self {
        $possibleReportsByTeam = Team::mapReports()[$this->user->current_team_id];

        if (! in_array(Atendimento::class, $possibleReportsByTeam)) {
            throw new ReportUnavailableException;
        }

        $atendimento = Atendimento::create([
            'via' => $via,
            'author_name' => $authorName,
            'author_contact' => $authorContact,
            'description' => $description,
        ]);

        $this->report = (new Report)->fill(['date' => $date]);
        $this->report->related()->associate($atendimento);
        $this->report->user()->associate($this->user);
        $this->report->team_id = $this->user->current_team_id;

        $this->report->save();

        return $this;
    }
}
