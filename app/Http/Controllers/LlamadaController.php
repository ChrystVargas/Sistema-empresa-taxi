<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LlamadaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
