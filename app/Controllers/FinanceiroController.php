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
        $data = [
            'dataf' => $this->request->getVar('dataf'),
            'banco' => $this->request->getVar('banco'),
            'tipo' => $this->request->getVar('tipo'),
            'historico' => $this->request->getVar('historico'),
            'numero' => $this->request->getVar('numero'),
            'valor' => $this->request->getVar('valor'),
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
        $data = [
            'dataf' => $this->request->getVar('dataf'),
            'banco' => $this->request->getVar('banco'),
            'tipo' => $this->request->getVar('tipo'),
            'historico' => $this->request->getVar('historico'),
            'numero' => $this->request->getVar('numero'),
            'valor' => $this->request->getVar('valor'),
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
    
    public function test()
    {
        return view('cliente_cadastro');
    }
}