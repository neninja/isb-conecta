<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $user = new User();
        $user->name = "Felipe";
        $user->email = "opa@gmail.com";

        /* dd("O"); */

        /* return Inertia::render('Admin/Dashboard'); */
        return Inertia::render('Admin/Dash');
        /* Inertia::render('Admin/Dashboard', [ */
        /*     'event' => $user->only( */
        /*         'name', */
        /*     ), */
        /* ]); */
    }
}
