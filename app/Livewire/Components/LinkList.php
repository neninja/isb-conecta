<?php

namespace App\Livewire\Components;

class LinkList extends Component
{
    const DEFAULT_ICON = 'heroicon-o-plus-circle';

    public function render()
    {
        return view('livewire.components.link-list');
    }
}
