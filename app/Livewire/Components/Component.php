<?php

namespace App\Livewire\Components;

use Livewire\Component as Base;

abstract class Component extends Base
{
    public array $options = [];

    public array $content = [];
}
