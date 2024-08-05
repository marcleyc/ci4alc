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

    public function filessub($path=null)
    {
        $caminho_da_pasta = FCPATH . './clientes/';
        $itens = scandir($caminho_da_pasta.'/'.$path); //dd($itens);// Obtém uma lista de todos os itens na pasta
        echo "<center><h1 style='color: white;'>Listar arquivos</h1></center>"; 
        echo "<style> body {background-color: #696969;} </style>";
        // Itera sobre cada item
        echo "<div style='display: flex; justify-content: center; align-items: center; '>";
        echo "<div style='border: 1px solid grey; border-radius: 10px; padding: 10px; width: 750px; background-color: white; '>";
        
        foreach ($itens as $item) 
        {
            // Ignora os diretórios . e ..
            if ($item == '.' || $item == '..' || $item == '.DS_Store') {continue;}

            $caminho_completo = $caminho_da_pasta . DIRECTORY_SEPARATOR . $item;
            $tamanho = filesize($caminho_completo)/1000;  
            $data_modificacao = date('d/m/Y', filemtime($caminho_completo));
            echo $data_modificacao;

            echo "<b>Arquivo:</b> <a style='line-height: 25px;' href= ".site_url('opensub/'.$path.'/'.$item)." '>$item</a> ' <br> ";
        }
        echo "</div></div>";
    }
    
    public function info()
    {
        $caminho_arquivo = FCPATH . './clientes/';
        $itens = scandir($caminho_arquivo); // Obtém uma lista de todos os itens na pasta

        foreach ($itens as $item) 
        {
            // Ignora os diretórios . e ..
            if ($item == '.' || $item == '..' || $item == '.DS_Store') {continue;}

            $caminho_completo = $caminho_arquivo . DIRECTORY_SEPARATOR . $item;
            $tamanho = filesize($caminho_completo)/1000;           
            $data_modificacao = date('d/m/Y', filemtime($caminho_completo));

            // opção de enviar dados para view
            $dados = [
                'nome' => $caminho_completo,
                'tamanho' => $tamanho,
                'data_modificacao' => $data_modificacao
            ];

            // Verifica se é um arquivo
            if (is_file($caminho_completo)) {
                echo "<b>Arquivo:</b> <a href='open/$item' style='line-height: 25px;'>$item</a> ' - ";
                echo "<b>Tamanho:</b> $tamanho bytes - ";
                echo "<b>Data:</b> $data_modificacao<br>";   
            }

            // Verifica se é uma pasta
            if (is_dir($caminho_completo)) {
                echo "<b style='color:green'>Pasta:</b> <a href='filessub/$item' style='line-height: 25px; '>$item</a> <br> "; 
            }
        }
    }

    public function infoOld()
    {
        $caminho_arquivo = FCPATH . './clientes/';
        $itens = scandir($caminho_da_pasta); // Obtém uma lista de todos os itens na pasta

        // Verifica se o arquivo existe e é legível
        if (!file_exists($caminho_arquivo) || !is_readable($caminho_arquivo)) {
            return 'Arquivo não encontrado ou não pode ser lido.';
        }

        // Obtém informações do arquivo
        $tamanho = filesize($caminho_arquivo);
        $data_modificacao = date('d/m/Y H:i:s', filemtime($caminho_arquivo));

        // Exibe as informações
        echo 'Nome do arquivo: ' . basename($caminho_arquivo) . '<br>';
        echo 'Tamanho: ' . $tamanho . ' bytes<br>';
        echo 'Última modificação: ' . $data_modificacao;
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

