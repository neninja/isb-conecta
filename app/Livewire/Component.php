<?php

namespace App\Livewire;

use Livewire\Component as Base;

abstract class Component extends Base
{
    public array $dynamic = [];

    abstract public function getTitle(): string;

    abstract public function getDescription(): string;

    public function component(string $name, $content = null, $options = [])
    {
        array_push($this->dynamic, [
            'name' => $name,
            'content' => $content,
            'options' => $options,
        ]);
    }

    public function render()
    {
        return view('livewire.app')
            ->layout('layouts.app', [
                'title' => $this->getTitle(),
                'description' => $this->getDescription(),
            ]);
    }
}
