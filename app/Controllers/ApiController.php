<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ClientesModel;

// https://www.positronx.io/codeigniter-rest-api-tutorial-with-example/#tc_11023_06

class ApiController extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index(){
      $model = new ClientesModel();
      $data['clientes'] = $model->select('idc,nome')->orderBy('idc', 'nome')->findAll();
      return $this->respond($data);
    }
    // create
    public function create() {
        $model = new EmployeeModel();
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
    // single user
    public function show($id = null){
        $model = new EmployeeModel();
        $data = $model->where('id', $id)->first();
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