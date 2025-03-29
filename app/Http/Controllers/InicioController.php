<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        return view('inicio'); // Asegúrate de que la vista exista en resources/views/inicio.blade.php
    }
}
