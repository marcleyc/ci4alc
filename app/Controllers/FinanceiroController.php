<?php

namespace App\Controllers;
use App\Models\FinanceiroModel;

//https://mfikri.com/en/blog/codeigniter-vuejs-crud 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class FinanceiroController extends BaseController
{
    public function index()
    {
        //$uModel = new FinanceiroModel();
        //$data['financeiro'] = $uModel->orderBy('dataf', 'DESC')->findAll();
        //dd($data);
        return view('financeiro/list');
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
        return view('financeiro/areceber');
    }

    public function areceber2()  // ------------------------ page a receber
    {
        return view('financeiro/areceber2');
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
                      ->where('recibopgt.repete !=','não')->where('recibopgt.repete !=',null)
                      
                      ->get()->getResultArray();
        $data = $results;
        //dd($data);
        echo json_encode($data);
    }

    public function test()
    {
        return view('cliente_cadastro');
    }
}