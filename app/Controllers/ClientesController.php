<?php 
namespace App\Controllers;
use App\Models\ClientesModel;
use CodeIgniter\Controller;

class ClientesController extends Controller
{
    // show data list
    public function index()
    {
        //echo "<h1>olá</h1>";
        $cli = new ClientesModel();
        $data['clientes'] = $cli->select('id,idc,nome,email')->orderBy('idc', 'nome')->findAll();
        //dd($data);
        return view('clientes/list', $data);
    }

    public function index1()  // ------------------------ php object array to datatable
    {
        $db = db_connect();          
        $query   = $db->query("SELECT id, idc, nome FROM clientes ORDER BY id DESC");
        $results = $query->getResultArray();
        $data['cliente'] = $results;
        return view('clientes/xboottable', $data);    
    }

    public function index2()  // ------------------------ php object array to vuetify
    {
        $db = db_connect();          
        $query   = $db->query("SELECT * FROM clientes ORDER BY id DESC");
        $results = $query->getResultArray();
        $data['cliente'] = $results;
        return view('clientes/vuetify', $data);    
    }

    public function create($id = null)  // ------------- add form
    {
        //$data = [ 'idc' => $id ];
        $data['idc'] = $id;
        //dd($data);
        //$data = $id;
        return view('clientes/add', $data);
    }
 
    public function store() // ----------------------- store data 
    {
        $userModel = new ClientesModel();
        $data = [
            'idc' => $this->request->getVar('idc'),
            'nome' => $this->request->getVar('nome'),
            'email'  => $this->request->getVar('email'),
        ];
        //dd($data);
        $userModel->insert($data);
        return $this->response->redirect(site_url('/clientes'));
    }
    
    public function edit($id = null) // ------------- edit page
    {
        $dataModel = new ClientesModel();
        $data['resp'] = $dataModel->where('id', $id)->first();
        //dd($data);
        return view('clientes/edit', $data);
    }

    public function update() // --------------------- update data
    {
        $userModel = new ClientesModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/clientes'));
    }
 
    public function delete($id = null) // ------------ delete data
    {
        $userModel = new ClientesModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/clientes'));
    }    

    public function porfamilia($id = null) // ---- mostrar os clientes pel IDC
    {
        $dataModel = new ClientesModel();
        $data['clientes'] = $dataModel->where('idc', $id)->findAll();
        //dd($data);
        return view('clientes/list', $data);
    }
}