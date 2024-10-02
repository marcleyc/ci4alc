<?php

namespace App\Controllers;

//use App\Models\TaskModel;
use App\Models\ClientesModel;
use CodeIgniter\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $model = new TaskModel();
        $data['tasks'] = $model->findAll();
        return view('tasks/index', $data);
    }

    public function create()
    {
        $model = new TaskModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description')
        ];
        $model->insert($data);
        return redirect()->to('/tasks');
    }

    public function edit($id)
    {
        $model = new TaskModel();
        $data['task'] = $model->find($id);
        return view('tasks/edit', $data);
    }

    public function update($id)
    {
        $model = new TaskModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description')
        ];
        $model->update($id, $data);
        return redirect()->to('/tasks');
    }

    public function delete($id)
    {
        $model = new TaskModel();
        $model->delete($id);
        return redirect()->to('/tasks');
    }
}
