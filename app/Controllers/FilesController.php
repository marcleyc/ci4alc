<?php

namespace App\Controllers;
use CodeIgniter\Files\File;
//use CodeIgniter\I18n\Time;

class FilesController extends BaseController // está funcionando
{
    public function files()
    {
        //$caminho_da_pasta = '/Users/marcley/Music/ci4alc/public/clientes';
        $caminho_da_pasta = FCPATH . './clientes/';
        $itens = scandir($caminho_da_pasta); // Obtém uma lista de todos os itens na pasta
        echo "<center><h1 style='color:white; margin:top 7px;'>Listar Clientes</h1></center>"; 
        echo "<style> body {background-color: #696969;} </style>";
        // Itera sobre cada item
        echo "<div style='display: flex; justify-content: center; align-items: center; '>";
        echo "<div style='border: 1px solid grey; border-radius: 10px; padding: 10px; width: 750px; background-color: white;'>";
        foreach ($itens as $item) 
        {
            // Ignora os diretórios . e ..
            if ($item == '.' || $item == '..' || $item == '.DS_Store') {continue;}

            $caminho_completo = $caminho_da_pasta . DIRECTORY_SEPARATOR . $item;
            
            // Verifica se é um arquivo
            if (is_file($caminho_completo)) {
                echo "<b>Arquivo:</b> <a href='open/$item' style='line-height: 25px;'>$item</a> ' <br> "; 
            }

            // Verifica se é uma pasta
            if (is_dir($caminho_completo)) {
                echo "<b style='color:green'>Pasta:</b> <a href='filessub/$item' style='line-height: 25px; '>$item</a> <br> "; 
            }
        }
        echo "</div></div>";
    }
    
    public function index()
    {   
        //$caminho = $_ENV['MYFILE']; // criar no .env o MYFILE com caminho '/Users/marcley/Downloads' 
        $caminho = $filePath = FCPATH . 'clientes/'; //dd($caminho);
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

    public function open($fileName)  // método para abrir o arquivo selecionado
    {
        $filePath = FCPATH . './clientes/' . urldecode($fileName); //dd($filePath);

        // Verifique se o arquivo existe antes de tentar abri-lo
        if (file_exists($filePath)) 
        {
            // Defina os cabeçalhos apropriados
            //header('Content-Type: application/pdf');
            $fileType = pathinfo($filePath, PATHINFO_EXTENSION); //echo $fileType;// Get file extension
            if($fileType == 'pdf') {header('Content-Type: application/pdf'); }  
            if($fileType == 'txt') {header('Content-Type: text/plain'); }
            if($fileType == 'jpg') {header('Content-Type: application/jpg'); }
        
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

    public function filessub($path=null)
    {
        $caminho_da_pasta = FCPATH . './clientes/';
        $itens = scandir($caminho_da_pasta.'/'.$path); //dd($itens);// Obtém uma lista de todos os itens na pasta
        echo "<center><h1>Listar arquivos</h1></center>"; 
        // Itera sobre cada item
        echo "<div style='display: flex; justify-content: center; align-items: center; '>";
        echo "<div style='border: 1px solid grey; border-radius: 10px; padding: 10px; width: 750px; '>";
        
        foreach ($itens as $item) 
        {
            // Ignora os diretórios . e ..
            if ($item == '.' || $item == '..' || $item == '.DS_Store') {continue;}

            $caminho_completo = $caminho_da_pasta . DIRECTORY_SEPARATOR . $item;

            echo "<b>Arquivo:</b> <a style='line-height: 25px;' href= ".site_url('opensub/'.$path.'/'.$item)." '>$item</a> ' <br> ";
        }
        echo "</div></div>";

    }

    public function opensub($path=null,$fileName=null)  // método para abrir o arquivo selecionado
    {
        $filePath = FCPATH . './clientes/'. $path .'/'. urldecode($fileName);

        // Verifique se o arquivo existe antes de tentar abri-lo
        if (file_exists($filePath)) 
        {
            // Defina os cabeçalhos apropriados
            header('Content-Type: application/pdf');
            //$fileType = pathinfo($filePath, PATHINFO_EXTENSION); // Get file extension
            //if($fileType == 'pdf') {header('Content-Type: application/pdf'); }  
            //if($fileType == 'txt') {header('Content-Type: text/plain'); }
            //if($fileType == 'jpg') {header('Content-Type: application/jpg'); }
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

}

