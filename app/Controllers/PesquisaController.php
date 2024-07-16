<?php

namespace App\Controllers;

class PesquisaController extends BaseController
{
    public function index()
    {
        return view('/pesquisa/portugues');
    }

    public function pesquisa()
    {
        $nomef = $this->request->getVar('nome');
        $nome = str_replace(' ', '+', $nomef); 
        $data = ['nome' => $nome];
        dd($data);
        return view('/pesquisa/pesquisa',$data);            
    }
}
