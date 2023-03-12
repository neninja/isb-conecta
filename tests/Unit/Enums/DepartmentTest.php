<?php

namespace Tests\Unit\Enums;

use App\Enums\Department;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    public function testCanGetLabel(): void
    {
        $this->assertEquals('Administração', Department::Administration->label());
        $this->assertEquals('Financeiro', Department::Finance->label());
        $this->assertEquals('Recepção', Department::Reception->label());
    }
}
