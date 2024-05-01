<?php

namespace App\Controllers;
use CodeIgniter\Files\File;
//use CodeIgniter\I18n\Time;

class FilesController extends BaseController // está funcionando
{
    public function index()
    {   
        $caminho = $_ENV['MYFILE']; // criar no .env o MYFILE com caminho '/Users/marcley/Downloads' 
        $directoryPath = $caminho;
        $filesList = scandir($directoryPath); // Obtenha uma matriz de arquivos na pasta
        // Passe a lista de arquivos e o caminho da pasta para a view
        return view('files', ['directoryPath' => $directoryPath, 'filesList' => $filesList]);
    }

    public function index2($idc = null)
    {
        //$directoryPath = FCPATH . 'clientes/'.$idc;
        $directoryPath = $_ENV['MYFILE'] .'/'. $idc; //dd($directoryPath);
        $filesList = scandir($directoryPath);        //dd($filesList);
        return view('files', ['directoryPath' => $directoryPath, 'filesList' => $filesList]);
    }

    public function index3()
    {
     // https://www.devmedia.com.br/listando-arquivos-de-pastas-com-php/17716
        //$path = FCPATH . 'clientes/';
        //$diretorio = dir($path);
        //echo "Lista de Arquivos do cliente '<strong>".$path."</strong>':<br />";
        //while($arquivo = $diretorio -> read()){ echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />"; }
        //$diretorio -> close();

    // -------------------------------------------------------------------------- N E W
        $caminho_da_pasta = '/Users/marcley/Music/ci4alc/public/clientes';
        $itens = scandir($caminho_da_pasta); // Obtém uma lista de todos os itens na pasta

        // Itera sobre cada item
        foreach ($itens as $item) 
        {
            // Ignora os diretórios . e ..
            if ($item == '.' || $item == '..') {continue;}

            $caminho_completo = $caminho_da_pasta . DIRECTORY_SEPARATOR . $item;

            // Verifica se é um arquivo
            if (is_file($caminho_completo)) {
                echo "Arquivo: <a href='files/open/$item'>$item</a> '<br>' "; 
            }

            // Verifica se é uma pasta
            if (is_dir($caminho_completo)) {
                echo "Pasta: <a href='files3p/$item'>$item</a> '<br>' "; 
            }
        }

    }

    public function index3p($path=null)
    {
        $caminho_da_pasta = '/Users/marcley/Music/ci4alc/public/clientes';
        $itens = scandir($caminho_da_pasta.'/'.$path); // Obtém uma lista de todos os itens na pasta
        // Itera sobre cada item
        foreach ($itens as $item) 
        {
            // Ignora os diretórios . e ..
            if ($item == '.' || $item == '..') {continue;}

            $caminho_completo = $caminho_da_pasta . DIRECTORY_SEPARATOR . $item;

            // Verifica se é um arquivo
            if (is_file($caminho_completo)) {
                echo "Arquivo: <a href='files/open/$path/$item'>$item</a> '<br>' "; 
            }

            // Verifica se é uma pasta
            if (is_dir($caminho_completo)) {
                echo "Pasta: <a href='files/open/$path/$item'>$item</a> '<br>' "; 
            }
        }

    }

    public function open($fileName)  // método para abrir o arquivo selecionado
    {
        $filePath = FCPATH . './clientes/' . urldecode($fileName);

        // Verifique se o arquivo existe antes de tentar abri-lo
        if (file_exists($filePath)) 
        {
            // Defina os cabeçalhos apropriados
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . basename($filePath) . '"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($filePath));
            header('Accept-Ranges: bytes');

            // Limpe o buffer de saída para garantir que não haja saída anterior
            ob_clean();

            // Leitura e saída do arquivo binário
            readfile($filePath);
            exit; // Importante para garantir que nenhum outro conteúdo seja enviado após o arquivo
        } 
        else 
        {
            echo 'Arquivo não encontrado.';
        }
    }

    public function opend($path=null,$fileName=null)  // método para abrir o arquivo selecionado
    {
        $filePath = FCPATH . './clientes/'. $path . urldecode($fileName);

        // Verifique se o arquivo existe antes de tentar abri-lo
        if (file_exists($filePath)) 
        {
            // Defina os cabeçalhos apropriados
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . basename($filePath) . '"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($filePath));
            header('Accept-Ranges: bytes');

            // Limpe o buffer de saída para garantir que não haja saída anterior
            ob_clean();

            // Leitura e saída do arquivo binário
            readfile($filePath);
            exit; // Importante para garantir que nenhum outro conteúdo seja enviado após o arquivo
        } 
        else 
        {
            echo 'Arquivo não encontrado.';
        }
    }

    public function filee($folder = null)
    {
        // Verifica se o diretório fornecido é válido
        if ($folder && is_dir(WRITEPATH . 'clientes/' . $folder)) {
            $data['files'] = directory_map(WRITEPATH . 'clientes/' . $folder);
            echo view('public/index', $data);
        } else {
            // Se o diretório não for válido, redireciona ou exibe uma mensagem de erro
            // redirecionar para uma página de erro, por exemplo.
            echo "Pasta não encontrada!";
        }
    }

}

