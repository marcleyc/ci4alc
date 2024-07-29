<?php

namespace App\Controllers;
use App\Models\FinanceiroModel;
use App\Models\ClientesModel;

//https://mfikri.com/en/blog/codeigniter-vuejs-crud 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class FinanceiroController extends BaseController
{
    public function index()
    {
        $dataModel = new ClientesModel();
        $data['clientesp'] = $dataModel->select('idc,nome')->findAll();
        return view('financeiro/list',$data);
    }

    public function financeiroj() // ------------------------ list of financeiro json
    {
        $dados = new FinanceiroModel();
        $dado = $dados->orderBy('id', 'DESC')->findAll();
        echo json_encode($dado);
    }
 
    public function show($id = null)
    {
        $model = new FinanceiroModel();
        $data = $model->find(['id' => $id]);
        if(!$data) return $this->failNotFound('No Data Found');
        return $this->respond($data[0]);
    }
    
    public function create()
    {
        return view('financeiro/add2');
    }

    public function store()
    {
        $userModel = new FinanceiroModel();
        $tipo = $this->request->getVar('tipo');
        $valor = $this->request->getVar('valor');
        $lista = array('recebimento','entrada');
        if (in_array($tipo, $lista)) {$valorn = $valor;} else {$valorn = $valor * -1;}
        $data = [
            'dataf' => $this->request->getVar('dataf'),
            'banco' => $this->request->getVar('banco'),
            'tipo' => $tipo, //$this->request->getVar('tipo'),
            'historico' => $this->request->getVar('historico'),
            'numero' => $this->request->getVar('numero'),
            'valor' => $valorn, //$this->request->getVar('valor'),
            'cliente' => $this->request->getVar('idc'),
            'obs' => $this->request->getVar('obs')           
        ];
        $userModel->insert($data);
        //dd($novoid);
        return $this->response->redirect(site_url('/financeiro'));
    }
 
    // show single user
    public function singleUser($id = null)
    {
        $userModel = new FinanceiroModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('financeiro/edit', $data);
    }    

    public function update()
    {
        $userModel = new FinanceiroModel();
        $id = $this->request->getVar('id');
        $tipo = $this->request->getVar('tipo');
        $valor = $this->request->getVar('valor');
        $lista = array('recebimento','entrada');
        if (in_array($tipo, $lista)) {$valorn = $valor;} else {$valorn = $valor * -1;}
        $data = [
            'dataf' => $this->request->getVar('dataf'),
            'banco' => $this->request->getVar('banco'),
            'tipo' => $tipo,
            'historico' => $this->request->getVar('historico'),
            'numero' => $this->request->getVar('numero'),
            'valor' => $valorn,
            'cliente' => $this->request->getVar('idc'),
            'obs' => $this->request->getVar('obs') 
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/financeiro'));
    }
 
    // delete user
    public function delete($id = null)
    {
        $userModel = new FinanceiroModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/financeiro'));
    }
    
    public function areceber()  // ------------------------ page a receber
    {
        $dataModel = new ClientesModel();
        $data['clientesp'] = $dataModel->select('idc,nome')->findAll();
        return view('financeiro/areceber',$data);
    }

    public function areceber2()  // ------------------------ page a receber
    {
        $dataModel = new ClientesModel();
        $data['clientesp'] = $dataModel->select('idc,nome')->findAll();
        return view('financeiro/areceber2',$data);
    }

    public function areceberj()  // ----------------------- a receber json
    {
        $db = db_connect();          
        $query = $db->query('SELECT recibosub.*, recibo.idc, MONTH(inicio) AS mes
                             FROM recibosub
                             INNER JOIN recibo ON recibo.id = recibosub.idRec
                             WHERE recibosub.periodicidade <> "N" AND recibosub.ok = "F" AND recibosub.inicio >= "2017-01-01"
                             ORDER BY mes ASC ');                
        $results = $query->getResultArray();
        //dd($results);
        echo json_encode($results);
    }

    public function areceberj2()  // ------------ report por serviços
    {    
        $db = db_connect(); 
        $results = $db->table('recibopgt')
                      ->select('recibopgt.*, recibo.idc')
                      ->join('recibo', 'recibo.id = recibopgt.idRec')
                      ->where('recibopgt.pgtoIVA =', '0000-00-00'  )
                      ->orWhere('recibopgt.pgtoIVA =', null)
                      ->orderBy('venct', 'nome')
                      ->get()->getResultArray();
        $data = $results;
        //dd($data);
        echo json_encode($data);
    }

    public function arecebera4()  // ------------ report por serviços
    {    
        $db = db_connect(); 
        $results = $db->table('recibopgt')
                      ->select('recibopgt.*, recibo.idc')
                      ->join('recibo', 'recibo.id = recibopgt.idRec')
                      ->where('recibopgt.pgtoIVA =', '0000-00-00'  )
                      ->orWhere('recibopgt.pgtoIVA =', null)
                      ->orderBy('venct', 'nome')
                      ->get()->getResultArray();
        $data['financeiro'] = $results;
        //dd($data);
        return view('lab/a4',$data);
    }

    public function test()
    {
        return view('cliente_cadastro');
    }

    public function mobile()  // ----------------- resumo mensal das finanças
    {
        $ano = date("Y"); // Pega o ano atual com quatro dígitos
        $mes = date("m"); // Pega o mês atual com dois dígitos
        $db = \Config\Database::connect();
        
        $query  = $db->query("SELECT tipo, YEAR(dataf) As ano, MONTH(dataf) As mes, SUM(valor) As total FROM financeiro WHERE YEAR(dataf)='$ano' and MONTH(dataf)='$mes' GROUP BY tipo, ano, mes ORDER BY ano,mes,tipo");
        $results = $query->getResultArray();
        
        $query2   = $db->query("SELECT tipo, ID as total from fintipo ORDER BY id");
        $tipos = $query2->getResultArray();

        //dd($tipos);

        $data = [];
        for ($y = 0; $y < sizeof($tipos); $y++) 
        { 
            $data[] = ['tipo' => $tipos[$y]["tipo"], 'total' => 0, 'id' => $y];
            for($i = 0; $i < sizeof($results); $i++)
            { 
              $tipox = $tipos[$y]["tipo"];
              $tipo = $results[$i]["tipo"];
              $total = $results[$i]["total"];
    
            if (strpos($tipo, $tipox) !== false) 
               { 
                $lastKey = array_key_last($data); //pega ultimo item inserido no array
                unset($data[$lastKey]); // apaga o registo pela key array
                $data[] = ['tipo' => $tipo, 'total' => $total, 'id' => $lastKey]; 
               } 
            }           
        }
        $data['dados'] = $data;
        //dd($data);
        //echo json_encode($data);
        return view('financeiro/mobile',$data);
    }
    
    public function mobile2()  // ----------------- resumo mensal das finanças
    {
        $ano = date("Y"); // Pega o ano atual com quatro dígitos
        $mes = date("m"); // Pega o mês atual com dois dígitos
        $db = \Config\Database::connect();
        $query   = $db->query("SELECT tipo, YEAR(dataf) As ano, MONTH(dataf) As mes, SUM(valor) As total FROM financeiro WHERE YEAR(dataf)='$ano' and MONTH(dataf)='$mes' GROUP BY tipo, ano, mes ORDER BY ano,mes,tipo");
        $results = $query->getResultArray();
        $data['dados'] = $results;
        echo json_encode($data);
        return view('financeiro/mobile',$data);
    }
    
    public function mobileadd()
    {
        return view('financeiro/mobile-add');
    }
}