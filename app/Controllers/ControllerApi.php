<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ContatosModel;
use App\Models\ClientesModel;

class ControllerApi extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index(){
      $model = new ContatosModel();
      $data['employees'] = $model->orderBy('id', 'DESC')->findAll();
      return $this->respond($data);
    }
    // create
    public function create() {
        $model = new ContatosModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $model->insert($data);
        $response = [
          'status'   => 201,
          'error'    => null,
          'messages' => [
              'success' => 'Employee created successfully'
          ]
      ];
      return $this->respondCreated($response);
    }
    // contatos por ID
    public function show($id = null){
        $model = new ContatosModel();
        $data = $model->where('id', $id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No employee found');
        }
    }
    // clientes por IDC
    public function showcli($id = null){
        $model = new ClientesModel();
        $data = $model->where('idc', $id)->findAll();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No employee found');
        }
    }

    // update
    public function update($id = null){
        $model = new EmployeeModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $model->update($id, $data);
        $response = [
          'status'   => 200,
          'error'    => null,
          'messages' => [
              'success' => 'Employee updated successfully'
          ]
      ];
      return $this->respond($response);
    }
    // delete
    public function delete($id = null){
        $model = new EmployeeModel();
        $data = $model->where('id', $id)->delete($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Employee successfully deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No employee found');
        }
    }
}