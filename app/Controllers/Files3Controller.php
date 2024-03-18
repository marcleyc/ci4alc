<?php

namespace App\Controllers;
use CodeIgniter\Files\File;
use CodeIgniter\Files\FileCollection;
//use CodeIgniter\Files\Filesystem;

class Files3Controller extends BaseController // está funcionando
{
    public function listFiles()
    {
        $files = new FileCollection([
            //FCPATH . 'index.php',
            ROOTPATH . 'writable/cli/',
        ]);
        //dd($files);
        echo 'My files: '."<br>" . implode($files->get())."<br>";
        echo 'I have ' . count($files) . ' files!'."<br>";

        foreach ($files as $file) {
            echo 'Moving ' . $file->getBasename() . ', ' . $file->getSizeByUnit('mb').'MB'  ;
            //$file->move(WRITABLE . $file->getRandomName());
        }
    }

    
    //$files->addDirectory(APPPATH . 'Filters');
    
    //$files = scandir('path/to/directory');
}

