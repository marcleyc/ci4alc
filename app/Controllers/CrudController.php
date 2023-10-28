<?php 
namespace App\Controllers;
use App\Models\CrudModel;
use CodeIgniter\Controller;
class CrudController extends Controller
{
    // show users list
    public function index(){
        //echo "<h1>olá</h1>";
        $userModel = new CrudModel();
        $data['contatos'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('crud/user_view', $data);
    }
    // add user form
    public function create(){
        return view('crud/add_user');
    }
 
    // insert data
    public function store() {
        $userModel = new CrudModel();
        $data = [
            'nome' => $this->request->getVar('nome'),
            'email'  => $this->request->getVar('email'),
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/users-list'));
    }
    // show single user
    public function singleUser($id = null){
        $userModel = new CrudModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('crud/edit_view', $data);
    }
    // update user data
    public function update(){
        $userModel = new CrudModel();
        $id = $this->request->getVar('id');
        $data = [
            'nome' => $this->request->getVar('nome'),
            'email'  => $this->request->getVar('email'),
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }
 
    // delete user
    public function delete($id = null){
        $userModel = new CrudModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    }    
}