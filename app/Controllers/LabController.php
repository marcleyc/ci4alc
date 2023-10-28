<?php

namespace App\Controllers;
use App\Models\Contatos;
use App\Models\Clientes;

class LabController extends BaseController
{
    
    public function index()
    {
        $dados['carros'] = "Megane";
        $dados['casas'] = "Condeixa";
        $variaveis = ['id'=>'10', 'nome'=>'Marcley'];
        return view('contatos',$variaveis);
        //return view('cliente_cadastro');            
    }

    // ============================= C O N T A T O S ===========================

    public function cadastro()
    {
        return view('formy');
    }

    public function contatoadd()
    {   
        $contato = new Contatos();
        $data = 
        [
          'nome' => $this->request->getVar('nome'),
          'portugues'  => $this->request->getVar('portugues'),
        ];
        $contato->insert($data);
        
        $db = \Config\Database::connect();
        $query   = $db->query("SELECT id, nome, portugues FROM Contatos ORDER BY id DESC LIMIT 1");
        $results = $query->getResult();

        $clientes = new Clientes();
        foreach ($results as $row) 
        {
            $data2 = 
            [
                'idc'  => $row->id,    
                'nome' => $row->nome,
                'estcivil' => $row->portugues,
            ];

            $clientes->insert($data2);
                echo $row->id; 
                echo '<br>';
                echo $row->nome;
                echo $row->portugues;
        }; 
        
    }

    public function contatoedt($id = null){            // show single user
        $db = \Config\Database::connect();
        $query   = $db->query("SELECT id, nome, portugues FROM Contatos WHERE id = $id ORDER BY id DESC LIMIT 1");
        $results = $query->getResult();
        return view('formy', $results);
    }

    public function formy()
    {
        return view('formy');           
    }

    public function clientecad()
    {   
        $clientes = new Clientes();
        $data = 
        [
          'nome' => $this->request->getVar('nome'),
          'email'  => $this->request->getVar('email'),
        ];
        $clientes->insert($data);
        return $this->response->redirect(site_url('/'));
    }

    public function clientesjson()
    {   
        $db = \Config\Database::connect();
        //$query   = $db->query('SELECT idc, nome FROM Clientes');
        $query   = $db->query("SELECT id, nome FROM Clientes ORDER BY id DESC LIMIT 1");
        $results = $query->getResult();
 
        //$myTime = Time::today('America/Chicago', 'en_US');
        
        foreach ($results as $row) 
        {
            echo $row->id; 
            echo $row->nome;
        }
        //echo dd($results); 
        //echo 'Total Results: ' . count($results);                       
    }

    public function contatos()
    {
        $dados = new Contatos();
        $dados->select("id,nome");
        $clientes = $clientes->findAll();

        foreach($clientes as $x){ $result[] = [$x['idc'], $x['nome']]; }
        $clientes = ['data' => $result];
        echo json_encode($clientes);            
    }
    
    public function clientes()
    {
        //return view('welcome_message');
        $clientes = new Clientes();
        $clientes->select("idc,nome");
        $clientes = $clientes->findAll();

        foreach($clientes as $x){ $result[] = [$x['idc'], $x['nome']]; }
        $clientes = ['data' => $result];
        echo json_encode($clientes);            
    }

    public function clientes2()
    {
        //return view('welcome_message');
        $clientes = new Clientes();
        $clientes->select("id, nome , email");
        $clientes = $clientes->orderBy('id DESC', 'nome')->findAll();

        foreach($clientes as $x){ $result[] = [$x['id'], $x['nome'], $x['nome'], $x['email']]; }
        $clientes = ['data' => $result];
        echo json_encode($clientes);            
    }
    // show single recibo com query
    public function reciboajax($id = null){  
        $db = db_connect();          
        #ou $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM Recibo WHERE id = $id ORDER BY id DESC LIMIT 1");
        $results = $query->getResultArray();
        $data['recibo'] = $results;
        #dd($data);
        return view('lab/phpvue', $data);
    }

    public function recibo($id = null){  
        $db = db_connect();          
        $query = $db->query("SELECT * FROM Recibo WHERE id = $id ORDER BY id DESC LIMIT 1");
        $query2 = $db->query("SELECT * FROM Recibosub WHERE idRec = $id ORDER BY id DESC");
        $results = $query->getResultArray();
        $results2 = $query2->getResultArray();
        $data['recibo'] = $results;
        $data['recibosub'] = $results2;
        //dd($data);
        return view('lab/phpvue', $data);
    }
}

//alternativa 1
    //return $last_row=$this->db->select('*')->order_by('id',"desc")->limit(1)->get('date_data')->row();

//alternativa 2
    //public function get_last_record(){
    // $this->db->select('*');
    // $this->db->from('date_data');
    // $this->db->order_by('created_at', 'DESC'); // 'created_at' is the column name of the date on which the record has stored in the database.
    // return $this->db->get()->row();