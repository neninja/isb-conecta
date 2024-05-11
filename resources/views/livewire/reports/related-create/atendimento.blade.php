<form class="space-y-2" wire:submit="handleCreate">
    <x-report-item-input
        label="Data do atendimento"
        type="date"
        icon="heroicon-o-calendar-days"
        wire:model="date"
        placeholder="Adicione a data do atendimento" />

    <x-report-item-radio-group
        :enum="\App\Enums\Via::class"
        placeholder="Adicione a data do atendimento"
        type="date"
        icon="heroicon-o-calendar-days"
        wire:model="via"
        label="Data do atendimento" />

    <x-report-item-input
        placeholder="Nome do usuário atendido"
        wire:model="authorName"
        label="Usuario atendido" />

    <x-report-item-input
        placeholder="E-mail ou telefone do usuário atendido"
        wire:model="authorContact"
        label="Contato do usuário" />

    <x-report-item-input
        type="textarea"
        placeholder="Relate sobre o atendimento realizado"
        wire:model="description"
        label="Relato do atendimento" />

    <x-button color="secondary" wire:loading.attr="disabled" full>Adicionar</x-button>
</form>
