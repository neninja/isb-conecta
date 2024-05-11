<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase;
use Livewire\Features\SupportTesting\Testable;
use Livewire\Livewire;

abstract class LivewireComponentTestCase extends TestCase
{
    protected string $component;

    public function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    protected function testComponent(array $parameters = []): Testable
    {
        return Livewire::test($this->component, $parameters);
    }

    protected function testWithQuery(array $query = []): Testable
    {
        return Livewire::withQueryParams($query)->test($this->component);
    }
}
