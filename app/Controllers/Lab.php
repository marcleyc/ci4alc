<?php
namespace App\Controllers;
use App\Models\ContatosModel;
use App\Models\ClientesModel;
use CodeIgniter\Controller;

use CodeIgniter\API\ResponseTrait;

class Lab extends BaseController
{
    public function index()
    {
       echo '<h1>Página Index</h1>';
    }
    
    public function cadastro($id)
    {
        return view('cliente_cadastro id'.$id);
    }

    public function fatura()
    {
        return view('recibos/recibo.php');
    }

    public function basico()
    {
        $dados['carros'] = "Megane";
        $dados['casas'] = "Condeixa";
        $variaveis = ['id'=>'10', 'nome'=>'Marcley'];
        return view('contatos',$variaveis);
        //return view('cliente_cadastro');            
    }

    public function contatoadd()   // ------------ add contato
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

    public function contatoedt($id = null)  // ------------ show single user
    {            
        $db = \Config\Database::connect();
        $query   = $db->query("SELECT id, nome, portugues FROM Contatos WHERE id = $id ORDER BY id DESC LIMIT 1");
        $results = $query->getResult();
        return view('formy', $results);
    }
    
    use ResponseTrait;
    public function clijson() // --------- https://www.positronx.io/codeigniter-rest-api-tutorial-with-example/
    {
      $model = new ClientesModel();
      $data['clientes'] = $model->orderBy('idc', 'nome')->findAll();
      return $this->respond($data);
    }

    public function contatos()  // ------------ api json de contatos
    {
        $dados = new ContatosModel();
        $dados->select("id,nome");
        $clientes = $dados->findAll();
        foreach($clientes as $x){ $result[] = [$x['id'], $x['nome']]; }
        $clientex = ['data' => $result];
        echo json_encode($clientes);
        //return view('lab/list2', $clientex);            
    }

    public function vuetify()   // ----------------- vuetify
    {
        $xModel = new ContatosModel();
        $contatos = $xModel->orderBy('id', 'DESC')->findAll();
        foreach($contatos as $x){ $result[] = [$x['id'], $x['nome'], $x['email']]; }
        $datax = ['data' => $result];
        //$datax = [$result];
        //echo json_encode($datax);
        //dd($datax);
        return view('lab/vuetify', $datax);
    }

    public function vuetifyOld()   // ----------------- vuetify
    {
    $userModel = new ContatosModel();
    $data['contatos'] = $userModel->orderBy('id', 'DESC')->findAll();
    dd($data);
    return view('lab/vuetify', $data);
    }

    public function clientes()  // ------------------ php object array to datatable
    {
        $db = db_connect();          
        $query   = $db->query("SELECT * FROM clientes ORDER BY id DESC");
        $results = $query->getResultArray();
        $data['cliente'] = $results;
        dd($data);
        return view('lab/paginacao', $data);
        //return view('lab/vuetify', $data);    
    }

    public function tramitando2() // ---------------- tramitando com query
    {  
        $db = db_connect();          
        $query = $db->query("SELECT recibo.idc, recibo.nome, recibosub.* , contatos.email 
        FROM recibo, recibosub, contatos 
        WHERE recibosub.idRec = recibo.id AND recibo.idc = contatos.id AND recibosub.ok = 'F' AND recibosub.inicio 
        IS NOT NULL ORDER BY recibosub.inicio DESC");
        $results = $query->getResultArray();
        $data['recibo'] = $results;
        #dd($data);
        return view('lab/tramitando', $data);
    }

    public function reciboajax($id = null)  // -------- show single recibo com query
    {  
        $db = db_connect();          
        #ou $db = \Config\Database::connect();
        $query   = $db->query("SELECT * FROM Recibo WHERE id = $id ORDER BY id DESC LIMIT 1");
        $results = $query->getResultArray();
        $data['recibo'] = $results;
        #dd($data);
        return view('lab/phpvue', $data);
    }

    public function sqlclientes() // ---------------- consulta com sql puro
    {
        $db = db_connect();
        $query = $db->query('SELECT recibo.idc, recibo.nome, recibosub.*, contatos.email, DATE_FORMAT(recibosub.inicio, "%Y-%m-%d") as date 
        FROM recibosub, recibo, contatos 
        WHERE recibosub.idRec = recibo.id AND recibosub.ok = "F" AND recibo.idc = contatos.id
        ORDER BY recibosub.inicio DESC');
        $results = $query->getResultArray();
        $data['recibo'] = $results;
        dd($data);
        return view('lab/phpvue', $data);
    }

    public function phpvue($id = null)  // ------------ OK show single recibo com query
    {  
        $db = db_connect();          
        $query   = $db->query("SELECT * FROM recibo WHERE id = $id ORDER BY id DESC LIMIT 1");
        $results = $query->getResultArray();
        $data['recibo'] = $results;
        #dd($data);
        return view('lab/recibo', $data);
    }

    public function recibo($id = null){  
        $db = db_connect();          
        $query = $db->query("SELECT * FROM recibo WHERE id = $id ORDER BY id DESC LIMIT 1");
        $query2 = $db->query("SELECT * FROM recibosub WHERE idRec = $id ORDER BY id DESC");
        $results = $query->getResultArray();
        $results2 = $query2->getResultArray();
        $data['recibo'] = $results;
        $data['recibosub'] = $results2;
        //dd($data);
        return view('lab/phpvue', $data);
    }

    public function recibob($id = null){  
        $db = db_connect();          
        $query = $db->query("SELECT * FROM recibo WHERE id = $id ORDER BY id DESC LIMIT 1");
        $query2 = $db->query("SELECT * FROM recibosub WHERE idRec = $id ORDER BY id DESC");
        $results = $query->getResultArray();
        $results2 = $query2->getResultArray();
        $data['recibo'] = $results;
        $data['recibosub'] = $results2;
        //dd($data);
        return view('lab/phpvueb', $data);
    }

    public function pastas(){  
        $path = ".../Views/";
        $diretorio = dir($path);

        echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";
        while($arquivo = $diretorio -> read()){
        echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
        }
        $diretorio -> close();
        //return view('lab/phpvueb', $data);
    }

    public function xboottablej() // ------------------------ json to boottable page
    {
        $cli = new ClientesModel();
        $clientes = $cli->select('id,idc,nome,email')->orderBy('idc', 'nome')->findAll();
        echo json_encode($clientes);
    }

    public function xboottable()  // -------------------- php object array to boottable
    {
        return view('lab/xboottable7');    
    }

    public function xboottable2()  // ------------------- object array to boottable 10% jeito mais rápido
    {
        $db = db_connect();          
        $query   = $db->query("SELECT id, idc, nome FROM clientes ORDER BY id DESC");
        $results = $query->getResultArray();
        $data['cliente'] = $results;
        return view('lab/xboottable5', $data);    
    }

    public function xboottable2b()  // ------------------------ php object array to boottable
    {
        $cli = new ClientesModel();
        $clientes = $cli->select('id,idc,nome')->orderBy('idc', 'nome')->findAll();
        $data['cliente'] = $clientes;
        return view('lab/xboottable2', $data);    
    }
    
}

