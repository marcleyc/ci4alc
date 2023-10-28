<?php

namespace App\Controllers;
use App\Models\Contatos;
use App\Models\Clientes;

class Home extends BaseController
{
    public function index()
    {
        return view('cliente_cadastro');
    }

    public function contatos()
    {
        return view('contatos');            
    }
}
