<?php

namespace App\Controllers;
//use CodeIgniter\I18n\Time;

class FilesController extends BaseController // está funcionando
{
    public function index()
    {
        // Caminho para a pasta que você deseja exibir
        $directoryPath = FCPATH . './clientes/';

        // Obtenha uma matriz de arquivos na pasta
        $filesList = scandir($directoryPath);
        //dd($filesList);

        // Passe a lista de arquivos e o caminho da pasta para a view
        return view('files', ['directoryPath' => $directoryPath, 'filesList' => $filesList]);
    }

    public function index2($idc = null)
    {
        $directoryPath = FCPATH . './clientes/'.$idc;
        $filesList = scandir($directoryPath);
        return view('files', ['directoryPath' => $directoryPath, 'filesList' => $filesList]);
    }

    public function index3()
    {
     // https://www.devmedia.com.br/listando-arquivos-de-pastas-com-php/17716
        //$path = "./clientes";
        $path = FCPATH . './clientes/';
        //$filePath = FCPATH . './clientes/' . urldecode($fileName);
        $diretorio = dir($path);

        echo "Lista de Arquivos do cliente '<strong>".$path."</strong>':<br />";
        while($arquivo = $diretorio -> read()){ echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />"; }
        $diretorio -> close();
    }

    public function open($fileName)  // método para abrir o arquivo selecionado
    {
    $filePath = FCPATH . './clientes/' . urldecode($fileName);

    // Verifique se o arquivo existe antes de tentar abri-lo
        if (file_exists($filePath)) {
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
        } else {
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

