<?php

namespace App\Livewire\Report\Create;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Atendimento extends Component
{
    public $date;

    public $via;

    public $authorName;

    public $authorContact;

    public $description;

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.reports.related-create.atendimento');
    }

    protected function messages(): array
    {
        return [
            'date.before_or_equal' => 'A data não deve ser futura',
        ];
    }

    public function rules()
    {
        return [
            'date' => 'required|before_or_equal:today',
            'via' => 'required',
            'authorName' => 'required',
            'authorContact' => 'required',
            'description' => 'required',
        ];
    }

    public function handleCreate()
    {
        $this->validate();

        try {
            DB::beginTransaction();
            (new \App\Models\Report)
                ->forceFill([
                    'date' => $this->date,
                    'user_id' => user()->id,
                    'team_id' => user()->current_team_id,
                ])
                ->related()
                ->associate((new \App\Models\Reports\Atendimento)->create([
                    'via' => $this->via,
                    'author_name' => $this->authorName,
                    'author_contact' => $this->authorContact,
                    'description' => $this->description,
                ]))
                ->save();

            DB::commit();

            $this->dispatch('toast.show.success', 'Sucesso!');
            $this->reset();
            $this->date = now()->format('Y-m-d');
        } catch (\Throwable $t) {
            DB::rollBack();
            report($t);
            $this->dispatch('toast.show.error', 'Erro!');
        }
    }
}
