<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Toast extends Component
{
    public const TYPE_SUCCESS = 'success';

    public const TYPE_ERROR = 'error';

    public const TYPE_COLORS = [
        self::TYPE_SUCCESS => 'primary',
        self::TYPE_ERROR => 'red-500',
    ];

    protected $listeners = [
        'toast.hide' => 'initProperties',
        'toast.show' => 'show',
        'toast.show.success' => 'showSuccess',
        'toast.show.error' => 'showError',
    ];

    public $isShown;

    public $type;

    public $title;

    public $body;

    public function mount()
    {
        $this->initProperties();
    }

    public function initProperties()
    {
        $this->isShown = false;
        $this->type = self::TYPE_SUCCESS;
        $this->title = null;
        $this->body = null;
    }

    public function render()
    {
        return view('livewire.components.toast');
    }

    public function show(?string $title = null, ?string $body = null, ?string $type = self::TYPE_SUCCESS)
    {
        if ($title) {
            $this->title = $title;
        }

        $this->body = $body;

        if ($type && array_key_exists($type, self::TYPE_COLORS)) {
            $this->type = $type;
        }

        $this->isShown = true;
        $this->dispatch('toast-showed');
    }

    public function showError(?string $title = null, ?string $body = null)
    {
        if (blank($title)) {
            $title = trans('errors.error_occurred');
        }

        if (blank($body)) {
            $body = trans('errors.generic');
        }

        $this->show($title, $body, self::TYPE_ERROR);
    }

    public function showSuccess(?string $title = null, ?string $body = null)
    {
        $this->show($title, $body, self::TYPE_SUCCESS);
    }
}
