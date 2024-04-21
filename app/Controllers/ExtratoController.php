<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\ExtratoModel;
use App\Models\ExtratotipoModel;

// https://www.positronx.io/codeigniter-import-csv-file-data-to-mysql-database-tutorial/

class ExtratoController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        return view('extrato/index');
    }

    public function listar($id = null)
    {
        $ano = $id; 
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM extrato WHERE tipo = 'null' ORDER BY descricao");
        $results = $query->getResult();
        $data['dados'] = $results;
        //echo json_encode($results);
        return view('extrato/listar', $data);
    }

    public function tipos()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM extratotipo ORDER BY tdescricao");
        $results = $query->getResult();
        $data['dados'] = $results;
        return view('extrato/tipos', $data);
    }

    public function tiposi()
    {
        return view('extrato/tiposi');
    }

    public function tiposs() // ----------------------- store data 
    {
        $userModel = new ExtratotipoModel();
        $data = [
            'ttipo' => $this->request->getVar('tipo'),
            'tdescricao' => $this->request->getVar('descricao'),
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/tiposi'));
    }

    public function extratov() // ------------------- lançar os tipos
    {
        $db = \Config\Database::connect();
        // Consulta para carregar dados da tabela 1
        $query = $db->query("SELECT id, descricao, tipo FROM extrato WHERE tipo = 'NULL'");
        $rtabela1 = $query->getResult(); //dd($rtabela1);
        
        // Consulta para carregar dados da tabela 2
        $query2 = $db->query("SELECT ttipo, tdescricao FROM extratotipo");
        $rtabela2 = $query2->getResult();

        foreach ($rtabela1 as $linha) {
            $descricao = strtolower($linha->descricao); $id = $linha->id;  
            
            foreach ($rtabela2 as $x) 
            {
                $tdescricao = strtolower($x->tdescricao);   $ttipo = $x->ttipo;
                if (strpos($descricao, $tdescricao) !== false)
                {
                    echo $id ." OK - ".$descricao ." - ".$ttipo."<br>";
                    $sql = $db->query("UPDATE extrato SET tipo = '$ttipo' WHERE id = '$id' ");
                } 
                else {;}  
            }    
        }
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

    public function resumoanual($id = null)
    {
        $ano = $id; 
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tipo, YEAR(data) As ano, SUM(valor) As total FROM extrato WHERE YEAR(data) = '$ano' GROUP BY tipo, ano ORDER BY ano, tipo");
        $results = $query->getResult();
        $data['dados'] = $results;
        //echo json_encode($results);
        return view('extrato/resumoanual', $data);
    }

    public function resumoj()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT tipo, YEAR(data) As ano, MONTH(data) As mes, SUM(valor) As total FROM extrato GROUP BY tipo, ano, mes");
        $data['dados'] = $query->getResult();
        return $this->respond($data);
    }
}