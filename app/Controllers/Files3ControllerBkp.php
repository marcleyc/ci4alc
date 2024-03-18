<?php

namespace App\Controllers;
use CodeIgniter\Files\File;
use CodeIgniter\Files\Filesystem;
use CodeIgniter\Files\FileCollection;

class Files3Controller extends BaseController // está funcionando
{
    public function listFiles()
    {
    $path = WRITEPATH . 'uploads/'; // Diretório onde estão os arquivos

    // Obtém a lista de arquivos no diretório
    $files = scandir($path);

    // Remove os elementos . e ..
    $files = array_diff($files, ['.', '..']);

    // Exibe a lista de arquivos como links
    echo "<ul>";
    foreach ($files as $file) {
        // Certifica-se de que o nome do arquivo não esteja vazio
        if (!empty($file)) {
            echo "<li><a href='" . base_url("Files3Controller/openFile/$file") . "'>$file</a></li>";
        }
    }
    echo "</ul>";
    }

    public function openFile($fileName = null)
    {
        if ($fileName === null) {
            echo 'O nome do arquivo não foi fornecido.';
            return;
        }
    
        $path = WRITEPATH . 'uploads/'; // Diretório onde estão os arquivos
    
        // Verifica se o arquivo existe
        if (file_exists($path . $fileName)) {
            // Define o tipo de conteúdo como PDF
            header('Content-Type: application/pdf');
            // Força o download do arquivo
            header('Content-Disposition: inline; filename="' . $fileName . '"');
            // Desabilita o cache
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');
            // Abre o arquivo PDF diretamente
            readfile($path . $fileName);
        } else {
            echo 'O arquivo não existe!';
        }
    }
    
    public function openFile2($fileName)
    {
        $path = WRITEPATH . 'uploads/'; // Diretório onde estão os arquivos

        // Verifica se o arquivo existe
        if (file_exists($path . $fileName)) {
            // Abre o arquivo para leitura
            $fileContent = file_get_contents($path . $fileName);
            echo "<pre>$fileContent</pre>";
        } else {
            echo 'O arquivo não existe!';
        }
    }

    public function createFolder()
    {
        $path = WRITEPATH . 'uploads/'; // Diretório onde você deseja criar a pasta
        $folderName = 'new_folder';

        // Verifica se a pasta já existe
        if (!is_dir($path . $folderName)) {
            // Cria a pasta se ela não existe
            mkdir($path . $folderName);
            echo 'Pasta criada com sucesso!';
        } else {
            echo 'A pasta já existe!';
        }
    }
}

