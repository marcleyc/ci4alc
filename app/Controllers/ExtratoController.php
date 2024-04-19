<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\ExtratoModel;

// https://www.positronx.io/codeigniter-import-csv-file-data-to-mysql-database-tutorial/

class ExtratoController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        return view('extrato/index');
    }

    public function importCsvToDb()
    {
        $input = $this->validate([
            'file' => 'uploaded[file]|max_size[file,2048]|ext_in[file,csv],'
        ]);
        if (!$input) {
            $data['validation'] = $this->validator;
            return view('index', $data); 
        }else{
            if($file = $this->request->getFile('file')) {
            if ($file->isValid() && ! $file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('../public/csvfile', $newName);
                $file = fopen("../public/csvfile/".$newName,"r");
                $i = 0;
                $numberOfFields = 4;
                $csvArr = array();
                
                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata);
                    if($i > 0 && $num == $numberOfFields){ 
                        $csvArr[$i]['name'] = $filedata[0];
                        $csvArr[$i]['email'] = $filedata[1];
                        $csvArr[$i]['phone'] = $filedata[2];
                        $csvArr[$i]['created_at'] = $filedata[3];
                    }
                    $i++;
                }
                fclose($file);
                $count = 0;
                foreach($csvArr as $userdata){
                    $students = new ExtratoModel();
                    $findRecord = $students->where('email', $userdata['email'])->countAllResults();
                    if($findRecord == 0){
                        if($students->insert($userdata)){
                            $count++;
                        }
                    }
                }
                session()->setFlashdata('message', $count.' rows successfully added.');
                session()->setFlashdata('alert-class', 'alert-success');
            }
            else{
                session()->setFlashdata('message', 'CSV file coud not be imported.');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
            }else{
            session()->setFlashdata('message', 'CSV file coud not be imported.');
            session()->setFlashdata('alert-class', 'alert-danger');
            }
        }
        return redirect()->route('/');         
    }

    public function resumo()
    {
        $db = \Config\Database::connect();
        $query   = $db->query("SELECT tipo, YEAR(data) As ano, MONTH(data) As mes, SUM(valor) As total FROM extrato GROUP BY tipo, ano, mes ORDER BY ano,mes,tipo");
        $results = $query->getResult();
        $data['dados'] = $results;
        //echo json_encode($data);
        return view('extrato/resumo', $data);
    }

    public function resumoanual()
    {
        $db = \Config\Database::connect();
        $query   = $db->query("SELECT tipo, YEAR(data) As ano, SUM(valor) As total FROM extrato GROUP BY tipo, ano ORDER BY ano, tipo");
        $results = $query->getResult();
        $data['dados'] = $results;
        //echo json_encode($results);
        return view('extrato/resumoanual', $data);
    }

    public function resumoj()
    {
        $db = \Config\Database::connect();
        $query   = $db->query("SELECT tipo, YEAR(data) As ano, MONTH(data) As mes, SUM(valor) As total FROM extrato GROUP BY tipo, ano, mes");
        $data['dados'] = $query->getResult();
        return $this->respond($data);
    }
}