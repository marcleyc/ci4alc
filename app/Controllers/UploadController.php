<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload/index');    
    }

    public function uploads()
    {
        $upload = $this->request->getFile('file');

        if ($upload->isValid() && !$upload->hasMoved())
        {
            $newName = $upload->getRandomName();
            $upload->move(ROOTPATH . 'public/uploads', $newName);

            // Lógica adicional, se necessário

            return redirect()->to('success_page')->with('success', 'Arquivo enviado com sucesso!');
        }
        else
        {
            return redirect()->back()->with('error', 'Falha ao enviar o arquivo.');
        }
    }
}


