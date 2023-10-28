<?php 
namespace App\Controllers;
use App\Models\ContatosModel;
use App\Models\ClientesModel;
use CodeIgniter\Controller;

class ContatosController extends Controller
{
    // list of contatos
    public function index(){
        //echo "<h1>olá</h1>";
        $userModel = new ContatosModel();
        $data['contatos'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('contatos/list', $data);
    }

    // add contato form
    public function create(){
        return view('contatos/add');
    }
 
    // insert contato
    public function store() {
        $userModel = new ContatosModel();
        $data = [
            'nome' => $this->request->getVar('nome'),
            'data' => $this->request->getVar('data'),
            'email'  => $this->request->getVar('email'),
            'cli'  => $this->request->getVar('check'),            
        ];
        $userModel->insert($data);
        $novoid = $userModel->insertID; // id da última inserção no contatos
        //dd($novoid);
        $data['idc'] = $novoid; 
        //dd($data);
        $cliente = new ClientesModel();
        $cliente->insert($data);
        return $this->response->redirect(site_url('/contatos'));
    }
    
    // edit page contatos
    public function singleUser($id = null){
        $userModel = new ContatosModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        //dd($data);
        return view('contatos/edit', $data);
    }
    // update contatos
    public function update(){
        $userModel = new ContatosModel();
        $id = $this->request->getVar('id');
        $data = [
            'nome' => $this->request->getVar('nome'),
            'email'  => $this->request->getVar('email'),
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/contatos'));
    }
 
    // delete contatos
    public function delete($id = null){
        $userModel = new ContatosModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/contatos'));
    }
    
    // show users list ----------------------------------------------------- L A B ---------------------
    public function lab(){  
        $userModel = new ContatosModel();
        $data['contatos'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('contatos/add_lab', $data);
    }
}