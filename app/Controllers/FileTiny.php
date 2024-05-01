<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class FileTiny extends Controller  //  /Users/marcley/Music/ci4alc/public/clientes
{
    public function index($caminho_da_pasta = '/')
    //public function index($caminho_da_pasta = '/')     
    {
        $caminho = '/Users/marcley/Music/ci4alc/public/clientes/';
        $data['caminho_da_pasta'] = $caminho.$caminho_da_pasta; //dd($data);
        //$data['caminho_da_pasta'] = $_ENV['MYFILE'].$caminho_da_pasta;
        $data['itens'] = $this->listarItens($caminho.$caminho_da_pasta);
        //dd($data);
        echo view('listar_arquivos', $data);
    }

    private function listarItens($caminho_da_pasta)
    {
        $itens = [];
        $caminho = '/Users/marcley/Music/ci4alc/public/clientes/';
        // Obtém uma lista de todos os itens na pasta
        $arquivos = scandir($caminho_da_pasta);

        foreach ($arquivos as $item) {
            // Ignora os diretórios . e ..
            if ($item == '.' || $item == '..') { continue; }

            $caminho_completo = $caminho_da_pasta . DIRECTORY_SEPARATOR . $item;

            // Verifica se é um arquivo
            if (is_file($caminho_completo)) {
                // Adiciona o arquivo à lista
                $itens[] = [
                    'nome' => $item,
                    'tipo' => 'arquivo',
                    'caminho' => $caminho_completo
                ];
            }

            // Verifica se é uma pasta
            if (is_dir($caminho_completo)) {
                // Adiciona a pasta à lista
                $itens[] = [
                    'nome' => $item,
                    'tipo' => 'pasta',
                    'caminho' => $caminho_completo
                ];
            }
        }

        return $itens;
    }
}
