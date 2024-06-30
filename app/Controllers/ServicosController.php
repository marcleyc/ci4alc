<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ServicosModel;
use App\Models\ClientesModel;

class ServicosController extends Controller
{
    public function index() // ---------------------------- list page
    {
        $dataModel = new ClientesModel();
        $data['clientesp'] = $dataModel->select('idc,nome')->findAll();
        return view('servicos/list',$data);
    }

    public function servicosj() // ------------------------ list json
    {
        $obj = new ServicosModel();
        $Servicos = $obj->select('id,descricao,honorarios,emolumentos,total,obs')->orderBy('descricao', 'ASC')->findAll();
        echo json_encode($Servicos);
    }

    public function create($id = null)  // ------------- form add
    {
        //$data = [ 'idc' => $id ];
        $data['idc'] = $id;
        //dd($data);
        //$data = $id;
        return view('clientes/add', $data);
    }
 
    public function store() // ----------------------- store data 
    {
        $xModel = new ServicosModel(); //descricao,honorarios,emolumentos,total,obs
        $data = [
            'descricao' => $this->request->getVar('fdescricao'),
            'honorarios' => $this->request->getVar('fhonorarios'),
            'emolumentos'  => $this->request->getVar('femolumentos'),
            'total'  => $this->request->getVar('ftotal'),
            'obs'  => $this->request->getVar('fobs'),
        ];
        //dd($data);
        $xModel->insert($data);
        return $this->response->redirect(site_url('/servicos'));
    }
    
    public function edit($id = null) // ------------- edit page
    {
        $dataModel = new ServicosModel();
        $data['resp'] = $dataModel->where('id', $id)->first();
        //dd($data);
        return view('clientes/edit', $data);
    }

    public function update() // --------------------- update data
    {
        $userModel = new ServicosModel();
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
        $xModel = new ServicosModel();
        $data['user'] = $xModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/servicos'));
    }    
 
}