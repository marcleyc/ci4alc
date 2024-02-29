<?php

namespace App\Controllers;
use CodeIgniter\Files\File;
use CodeIgniter\Config\BaseConfig;

class Files2Controller extends BaseController // está funcionando
{
    public function filecreate()
    {    
        $path = WRITEPATH . 'uploads/nova_pasta';
        // Verifica se a pasta não existe antes de criar
        if (! is_dir($path)) {
            mkdir($path, 0777, true); // Cria a pasta com permissões 0777 recursivamente
        }
    }

    public function filelist()
    {   
        $path = WRITEPATH . 'cli'; //dd($path);
        // Verifica se a pasta existe antes de listar os arquivos
        if (is_dir($path)) {
            $files = scandir($path); // Lista os arquivos na pasta
            foreach ($files as $file) { echo $file . '<br>'; }
        }
    }

    public function fileren()  //renomear arquivos
    {   
        $oldName = WRITEPATH . 'uploads/arquivo_antigo.txt';
        $newName = WRITEPATH . 'uploads/arquivo_novo.txt';

        // Verifica se o arquivo antigo existe antes de renomear
        if (is_file($oldName)) {
            rename($oldName, $newName); // Renomeia o arquivo
        }
    }

    public function filedel()  //renomear arquivos
    {   
        $filePath = WRITEPATH . 'uploads/arquivo_a_ser_excluido.txt';
        // Verifica se o arquivo existe antes de excluí-lo
        if (is_file($filePath)) {
            unlink($filePath); // Exclui o arquivo
        }
    }

    public function filetest()
    {   
        // Define o caminho para a pasta
        $pasta = $_ENV['MYFILE'];

        // Verifica se a pasta existe
        if (is_dir($pasta)) {
            // Obtém a lista de arquivos na pasta
            $arquivos = scandir($pasta);
            
            // Remove os diretórios . e ..
            $arquivos = array_diff($arquivos, array('.', '..'));
            
            // Exibe os links para os arquivos
            foreach ($arquivos as $arquivo) {
                echo '<a href="' . $pasta . $arquivo . '">' . $arquivo . '</a><br>';
            }
        } 
        else { echo 'A pasta não existe.';}
    }

    public function filetest2()
    {   
        // Define o caminho para a pasta
        $pasta = $_ENV['MYFILE'];
        $diretorio = $pasta;

        $arquivos = scandir($diretorio);  // Lista os arquivos no diretório
        //dd($arquivos);
        // Itera sobre os arquivos
        foreach ($arquivos as $arquivo) {
            // Ignora os diretórios pai e atual
            if ($arquivo == '.' || $arquivo == '..') { continue; }

            // Caminho completo para o arquivo
            $caminhoCompleto = $diretorio .'/'. $arquivo;

            if (is_dir($caminhoCompleto)) { echo "O arquivo $arquivo é um diretório.<br>"; } // Verifica se o arquivo é um diretório
            else { echo "<a href='$caminhoCompleto'>$arquivo</a><br>";} // Cria o link para o arquivo PDF
            //else { echo "<a href='$caminhoCompleto target='_blank'>$arquivo</a><br>";} // Cria o link para o arquivo PDF
        }

        
    }

}



