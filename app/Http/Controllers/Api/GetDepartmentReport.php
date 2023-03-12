<?php

namespace App\Http\Controllers\Api;

use App\Enums\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Info(title="ISB Conecta", version="0.0.0"),
 * @OA\ExternalDocumentation(
 *     url="https://github.com/nenitf/isb-conecta",
 *     description="Sistema de relatórios",
 * ),
 * @OA\SecurityScheme(
 *     securityScheme="JWT",
 *     type="http",
 *     scheme="bearer"
 * ),
 */
class GetDepartmentReport extends Controller
{
    public function __invoke(Request $request, Department $department)
    {
        // echo($department->value);
    }
}
