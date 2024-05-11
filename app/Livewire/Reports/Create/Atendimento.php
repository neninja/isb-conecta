<?php

namespace App\Livewire\Reports\Create;

use App\Enums\Via;
use App\Exceptions\AppException;
use App\Services\Reports\AtendimentoService;
use Carbon\Carbon;
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
            app(AtendimentoService::class)
                ->setUser(user())
                ->create(
                    Carbon::createFromFormat('Y-m-d', $this->date),
                    Via::from($this->via),
                    $this->authorName,
                    $this->authorContact,
                    $this->description,
                );

            $this->dispatch('toast.show.success', 'Sucesso!');
            $this->reset();
            $this->date = now()->format('Y-m-d');
        } catch (AppException $t) {
            report($t);
            $this->dispatch('toast.show.error', $t->friendlyReport());
        } catch (\Throwable $t) {
            report($t);
            $this->dispatch('toast.show.error', 'Erro!');
        }
    }
}
