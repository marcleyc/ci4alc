<?php 
namespace App\Controllers;
use App\Models\ClientesModel;
use CodeIgniter\Controller;

class ClientesController extends Controller
{
    // show users list
    public function index(){
        //echo "<h1>olá</h1>";
        $cli = new ClientesModel();
        $data['clientes'] = $cli->orderBy('idc', 'nome')->findAll();
        return view('clientes/list', $data);
        //return dd($data);
    }
    // add user form
        public function adicionar(){
        return view('clientes/add');
    }
 
    // insert data
    public function store() {
        $userModel = new UserModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/users-list'));
    }
    // show single user
    public function singleUser($id = null){
        $userModel = new UserModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('edit_user', $data);
    }
    // update user data
    public function update(){
        $userModel = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }
 
    // delete user
    public function delete($id = null){
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    }    
}