<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetDepartmentReport extends Controller
{
    public function __invoke(Request $request)
    {
        var_dump('A');
        exit;
    }
}
