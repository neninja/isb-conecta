<?php

namespace App\Livewire\Components;

class ResourceList extends Component
{
    const DEFAULT_ICON = 'heroicon-c-arrow-up-right';

    public function render()
    {
        return view('livewire.components.resource-list');
    }
}
