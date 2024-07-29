<?php 
namespace App\Controllers;
use App\Models\RecibosModel;
use App\Models\ClientesModel;
use App\Models\RecibosubModel;
use App\Models\RecibopgtModel;
use App\Models\ServicosModel;
use App\Models\ReclocalModel;
use App\Models\PrestadorModel;
use CodeIgniter\Controller;
use CodeIgniter\Database\Query;

class RecibosController extends Controller
{   
// =========== R  E  C  I  B  O              ===============================================    
    public function index()  
    {  
        $dataModel = new ClientesModel();
        $data['clientesp'] = $dataModel->select('idc,nome')->findAll();
        return view('recibos/list',$data);
    }

    public function recibosj()  // --------- recibos json
    {  
        $cli = new RecibosModel();
        $results = $cli->select('*')->orderby('dataf DESC')->findAll();
        echo json_encode($results);
    }

    public function reciboadd()  // ------------------------  add form recibosub
    {
        $db = db_connect(); 
        $query   = $db->query("SELECT idc, nome FROM clientes ORDER BY nome ASC");
        $results = $query->getResultArray();
        $data['recibos'] = $results;
        
        foreach($results as $x){ $result[] = $x['nome']; }
        $rec = ['data' => $result];
        $data['rec'] = $rec;

        $query2   = $db->query("SELECT nomep FROM prestador ORDER BY nomep ASC");
        $results2 = $query2->getResultArray();
        $data['prestador'] = $results2;

        return view('recibos/recibo-add', $data);
    }

    public function recibo($id = null){
        $dataModel = new ClientesModel();
        $data['clientesp'] = $dataModel->select('idc,nome')->findAll();
          
        $db = db_connect();          
        $query = $db->query("SELECT * FROM recibo WHERE id = $id ORDER BY id DESC LIMIT 1");
        $query2 = $db->query("SELECT * FROM recibosub WHERE idRec = $id ORDER BY id ASC");
        $query3 = $db->query("SELECT * FROM recibopgt WHERE idRec = $id ORDER BY id ASC");
        $results = $query->getResultArray();
        $results2 = $query2->getResultArray();
        $results3 = $query3->getResultArray();
        $data['recibo'] = $results;
        $data['recibosub'] = $results2;
        $data['recibopgt'] = $results3;
        //dd($data); //idRec:176
        return view('recibos/recibo', $data);
        //$results = $query->getResultArray();
    }
 
    public function recibostore()  // -------------------------- insert data 
    {
        $xModel = new RecibosModel();
        $data = [
            'nome' => $this->request->getVar('nome'),
            'dataf' => $this->request->getVar('fdata'),
            'idc'  => $this->request->getVar('fidc'),
            'prestador'  => $this->request->getVar('fprestador'),
            'tipo_pgto'  => $this->request->getVar('fparcela'),
            'parceria'  => $this->request->getVar('fparceria'),
            'obs'  => $this->request->getVar('fobs'),               
        ];
        $xModel->insert($data);
        $novoid = $xModel->insertID; // id da última inserção no contatos
        $data['idc'] = $novoid; 
        return $this->response->redirect(site_url('/recibo/'.$novoid));
    }

    public function reciboe($id = null) // ---------------- edit page recibo
    {
        $xModel = new RecibosModel();
        $dados = $xModel->where('id', $id)->first();
        $data['rec'] = $dados; 
        $idc = $dados['idc'];
        
        $xModel2 = new ClientesModel();
        $data['cli'] = $xModel2->where('idc', $idc)->findAll();
        
        $xModel3 = new PrestadorModel();
        $data['pre'] = $xModel3->findAll();

        //dd($data);
        return view('recibos/recibo-edt', $data);
    }

    public function recibou()  // --------------------------- update recibosub
    {       
        $xModel = new RecibosModel();
        $data = [
            'nome' => $this->request->getVar('nome'),
            'dataf' => $this->request->getVar('fdata'),
            'idc'  => $this->request->getVar('fidc'),
            'prestador'  => $this->request->getVar('fprestador'),
            'tipo_pgto'  => $this->request->getVar('fparcela'),
            'parceria'  => $this->request->getVar('fparceria'),
            'obs'  => $this->request->getVar('fobs'),
        ];
        $id = $this->request->getVar('fid');
        //dd($id);
        $xModel->update($id, $data);
        $idrec = $this->request->getVar('fidrec');
        return $this->response->redirect(site_url('recibo/'.$id));
    }

    public function recibod($id = null) // ------------------ deletar recibopgt
    {
        $xModel = new RecibosModel();
        $data['recibo'] = $xModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/recibos/'));
    }

// =========== R  E  C  I  B  O  S  U  B     ===============================================

    public function recibosub($idc = null, $id = null)  // -----------------form inclusão recibosub
    {
        $db = db_connect();          
        $query = $db->query("SELECT * FROM clientes WHERE idc = $idc ORDER BY nome ASC");
        $results = $query->getResultArray();
        $data['cliente'] = $results;
        $query2 = $db->query("SELECT * FROM servicos ORDER BY descricao ASC");
        $results2 = $query2->getResultArray();
        $data['servico'] = $results2;
        $data['recibo'] = $id;
        //dd($data);
        return view('recibos/recibosub-add', $data);
    }

    public function recibosubstore()  // ------------------ inserir recibosub
    {   
        $servico = $this->request->getVar('fservico'); 
        $xModel = new RecibosubModel();
        $data = [
            'nome' => $this->request->getVar('nome'),
            'servicos' => $servico,
            'locals'  => $this->request->getVar('flocal'),
            'honorarios'  => $this->request->getVar('fhonorarios'),
            'custas'  => $this->request->getVar('fcustas'),
            'total'  => $this->request->getVar('fhonorarios')+$this->request->getVar('fcustas'),
            'idRec'  => $this->request->getVar('fidrec'),
            'periodicidade' => $this->request->getVar('fperiodicidade'),
            'apensado'  => $this->request->getVar('fapensado'),               
        ];
        //dd($data);
        $xModel->insert($data);
        //$novoid = $xModel->insertID; // id da última inserção no contatos
        $id = $this->request->getVar('fidrec');
        $dados = $xModel->where('idRec', $id)->findAll();
        $thon = 0;
        $tcus = 0;
        foreach($dados as $x){ $thon += $x['honorarios']; $tcus += $x['custas'];};
        $ttot = $thon + $tcus;
        $datar = [
            'tothonorarios' => $thon,
            'totcustas'  => $tcus,
            'total'  => $ttot
        ];
        $xRecibo = new RecibosModel();
        $xRecibo->update($id, $datar);
        
        // INSERIR PARCELA
        $xRecibopgt = new RecibopgtModel();
        $periodicidade = $this->request->getVar('fperiodicidade');
        if ($periodicidade != "N"){ 
          //$hoje = date("Y-m-d");
          $hoje = new \DateTime();  
          if ($periodicidade === "S") {$hoje->add(new \DateInterval("P6M"));};
          if ($periodicidade === "A") {$hoje->add(new \DateInterval("P12M"));};
            $data2 = [
                'idRec' => $id, 
                'venct' => $hoje->format('Y/m/d'),
                'valor' => $this->request->getVar('fhonorarios'),
                'iva' => 0,
                'total' => $this->request->getVar('fhonorarios'),
                'tipo' => 'honorários',
                'nome' => $this->request->getVar('nome'),
                'serv' => $this->request->getVar('fservico'), 
            ];
            //dd($data2);
            $xRecibopgt->insert($data2);
        } 
        return $this->response->redirect(site_url('/recibo/'.$id));
    }

    public function recibosube($id = null) // ------------------- edit page recibosub
    {
        $xModel = new RecibosubModel();
        $dados = $xModel->where('id', $id)->first(); 
        $data['recibosub'] = $dados;
        $idRec = $dados['idRec'];
        
        $xRecibo = new RecibosModel();
        $recibo = $xRecibo->where('id', $idRec)->first();
        $data['recibo'] = $recibo;
        $idc = $recibo['idc'];

        $xModel2 = new ClientesModel();
        $data['clientes'] = $xModel2->where('idc', $idc)->findAll();
        $data['clientess'] = $xModel2->where('idc', $idc)->select('nome')->findAll();
        
        $xModel3 = new ServicosModel();
        $data['servicos'] = $xModel3->orderby('descricao')->findAll();

        $xModel4 = new ReclocalModel();
        $data['local'] = $xModel4->findAll();
        //dd($data);
        return view('recibos/recibosub-edt', $data);   
    }    

    public function recibosubu()  // --------------------------- update recibosub
    {       
        $xModel = new RecibosubModel();
        $data = [
            'id'  => $this->request->getVar('fid'),
            'nome' => $this->request->getVar('nome'),
            'servicos' => $this->request->getVar('fservico'),
            'locals'  => $this->request->getVar('flocal'),
            'honorarios'  => $this->request->getVar('fhonorarios'),
            'custas'  => $this->request->getVar('fcustas'),
            'total'  => $this->request->getVar('fhonorarios')+$this->request->getVar('fcustas'),
            'idRec'  => $this->request->getVar('fidrec'),
            'inicio'  => $this->request->getVar('finicio'),
            'nprocesso'  => $this->request->getVar('fnprocesso'),
            'codigo'  => $this->request->getVar('fcodigo'),
            'sit'  => $this->request->getVar('fsit'),
            'termino'  => $this->request->getVar('ftermino'),
            'ok'  => $this->request->getVar('fok'),
            'periodicidade'  => $this->request->getVar('fperiodicidade'),
            'apensado'  => $this->request->getVar('fapensado'),  
        ];
        //dd($data);
        $id = $this->request->getVar('fid');
        $xModel->update($id, $data);
        $idrec = $this->request->getVar('fidrec');

        $id = $this->request->getVar('fidrec');
        $dados = $xModel->where('idRec', $id)->findAll();
        $thon = 0;
        $tcus = 0;
        foreach($dados as $x){ $thon += $x['honorarios']; $tcus += $x['custas'];};
        $ttot = $thon + $tcus;
        $datar = [
            'tothonorarios' => $thon,
            'totcustas'  => $tcus,
            'total'  => $ttot
        ];
        $xRecibo = new RecibosModel();
        $xRecibo->update($id, $datar);
        return $this->response->redirect(site_url('recibo/'.$id));
        //return $this->response->redirect(site_url('/recibo/'.$idrec));
    }
 
    public function recibosubdel($id = null, $idrec = null) // ------------------ deletar recibosub
    {
        $xModel = new RecibosubModel();
        $data['recibosub'] = $xModel->where('id', $id)->delete($id);
        $dados = $xModel->where('idRec', $idrec)->findAll();
        // Atualiza o total do Recibo
        $thon = 0;
        $tcus = 0;
        foreach($dados as $x){ $thon += $x['honorarios']; $tcus += $x['custas'];};
        $ttot = $thon + $tcus;
        $data = [
            'tothonorarios' => $thon,
            'totcustas'  => $tcus,
            'total'  => $ttot
        ];
        $xRecibo = new RecibosModel();
        //$id = $idrec;
        $xRecibo->update($idrec, $data);
        return $this->response->redirect(site_url('/recibo/'.$idrec));
    }

    public function porfamilia($id = null) // ---- filtrar recibosub por cliente
    {
        $dataModel = new ClientesModel();
        $dataid['idc'] = $id;
        return view('recibos/processos-idc', $dataid);
    }

    public function familiar($id = null)  // --------- filtrar os recibosub por IDC - json
    {  
        $cli = new RecibosubModel();
        $results = $cli->select('recibosub.*')
                        ->join('recibo', 'recibo.id = recibosub.idRec')
                        ->where('recibo.idc',$id)
                        ->orderby('inicio DESC')->findAll();
        //$results = $query->getResultArray();
        //dd($results);
        echo json_encode($results);
    }

// =========== P  R  O  C  E  S  S  O  S     ===============================================

    public function processos()  // ------------------------- pág boottable processo
    { return view('recibos/processos'); }

    public function processosj()  // --------- filtrar os recibosub por IDC - json
    {  
        $cli = new RecibosubModel();
        $results = $cli->select('recibosub.*, recibo.idc')
                        ->join('recibo', 'recibo.id = recibosub.idRec')
                        ->orderby('inicio DESC')->findAll();
        echo json_encode($results);
    }

// =========== T  R  A  M  I  T  A  N  D  O  ===============================================


    public function tramitando()  // ------------------------ tramitando com sql
    {  
        $dataModel = new ClientesModel();
        $data['clientesp'] = $dataModel->select('idc,nome')->findAll(); 
        return view('recibos/tramitando',$data);
    }

    public function tramitandoj()  // ----------------------- tramitando json
    {
        $db = db_connect();          
        $query = $db->query('SELECT recibosub.*, recibo.idc
                             FROM recibosub
                             INNER JOIN recibo ON recibo.id = recibosub.idRec
                             WHERE recibosub.locals LIKE "IRN%" AND recibosub.ok = "F" AND recibosub.inicio >= "2017-01-01"
                             ORDER BY recibosub.inicio DESC ');                
        $results = $query->getResultArray();
        echo json_encode($results);
    }
    
    public function tramitando4()  // ------------ tramitando com vuetify
    {  
        $dataModel = new ClientesModel();
        $data['clientesp'] = $dataModel->select('idc,nome')->findAll();
        return view('recibos/tramitando4',$data);
    }

    public function tramitandoj4()  // ------------------------ tramitando com sql
    {  
        $cli = new RecibosubModel();
        $results = $cli->select('*')
                        ->like('locals', 'IRN', 'after')
                        ->where('ok','F')->where('inicio >','2017-01-01')
                        ->orderby('servicos ASC, inicio ASC, locals ASC')->findAll();
        $data['recibosub'] = $results;
        echo json_encode($results);
        //return view('recibos/tramitando');
    }

    public function tramitandoet($id = null) // ------------------- edit page tramitando
    {
        $xModel = new RecibosubModel();
        $dados = $xModel->where('id', $id)->first();
        $data['recibosub'] = $dados;
        $idRec = $dados['idRec'];
        
        $xRecibo = new RecibosModel();
        $recibo = $xRecibo->where('id', $idRec)->first();
        $data['recibo'] = $recibo;
        $idc = $recibo['idc'];

        $xModel2 = new ClientesModel();
        $data['clientes'] = $xModel2->where('idc', $idc)->findAll();
        $data['clientess'] = $xModel2->where('idc', $idc)->select('nome')->findAll();
        
        $xModel3 = new ServicosModel();
        $data['servicos'] = $xModel3->findAll();

        $xModel4 = new ReclocalModel();
        $data['local'] = $xModel4->findAll();
        //dd($data);
        return view('recibos/tramitando-edt', $data);
    }

    public function tramitandoet2($id = null) // ------------------- edit page tramitando
    {
        $xModel = new RecibosubModel();
        $dados = $xModel->where('id', $id)->first();
        $data['recibosub'] = $dados;
        $idRec = $dados['idRec'];
        
        $xRecibo = new RecibosModel();
        $recibo = $xRecibo->where('id', $idRec)->first();
        $data['recibo'] = $recibo;
        $idc = $recibo['idc'];

        $xModel2 = new ClientesModel();
        $data['clientes'] = $xModel2->where('idc', $idc)->findAll();
        $data['clientess'] = $xModel2->where('idc', $idc)->select('nome')->findAll();
        
        $xModel3 = new ServicosModel();
        $data['servicos'] = $xModel3->findAll();

        $xModel4 = new ReclocalModel();
        $data['local'] = $xModel4->findAll();
        //dd($data);
        return view('recibos/tramitando-edt2', $data);
    }

    public function tramitandou()  // --------------------------- update tramitando
    {       
        $xModel = new RecibosubModel();
        $data = [
            'id'  => $this->request->getVar('fid'),
            'nome' => $this->request->getVar('nome'),
            'servicos' => $this->request->getVar('fservico'),
            'locals'  => $this->request->getVar('flocal'),
            'honorarios'  => $this->request->getVar('fhonorarios'),
            'custas'  => $this->request->getVar('fcustas'),
            'total'  => $this->request->getVar('fhonorarios')+$this->request->getVar('fcustas'),
            'idRec'  => $this->request->getVar('fidrec'),
            'inicio'  => $this->request->getVar('finicio'),
            'nprocesso'  => $this->request->getVar('fnprocesso'),
            'codigo'  => $this->request->getVar('fcodigo'),
            'sit'  => $this->request->getVar('fsit'),
            'termino'  => $this->request->getVar('ftermino'),
            'ok'  => $this->request->getVar('fok'),
            'periodicidade'  => $this->request->getVar('fperiodicidade'),
            'verificado'  => $this->request->getVar('fverificado'),
        ];
        //dd($data);
        $id = $this->request->getVar('fid');
        $xModel->update($id, $data);
        $idrec = $this->request->getVar('fidrec');

        $id = $this->request->getVar('fidrec');
        $dados = $xModel->where('idRec', $id)->findAll();
        $thon = 0;
        $tcus = 0;
        foreach($dados as $x){ $thon += $x['honorarios']; $tcus += $x['custas'];};
        $ttot = $thon + $tcus;
        $datar = [
            'tothonorarios' => $thon,
            'totcustas'  => $tcus,
            'total'  => $ttot
        ];
        $xRecibo = new RecibosModel();
        $xRecibo->update($id, $datar);
        return $this->response->redirect(site_url('tramitando4/'));
        //return $this->response->redirect(site_url('/recibo/'.$idrec));
    }


    public function tramitando1()  // ------------ tramitando nas conservatórias
    {  
        $db = db_connect();          
        $query = $db->query('SELECT recibosub.*, recibo.idc  
        FROM recibosub
        INNER JOIN recibo ON recibo.id = recibosub.idRec
        WHERE  recibosub.ok = "F" AND recibosub.inicio >= "2017-01-01"
        ORDER BY recibosub.inicio DESC, recibosub.locals ASC, recibosub.servicos ASC');                 
        $results = $query->getResultArray();
        $data['recibosub'] = $results;
        //dd($data);
        return view('recibos/tramitando-bkp', $data);
    }

    public function tramitando2()  // ------------ report das conservatorias
    {  
        $cli = new RecibosubModel();
        $results = $cli->select('*')
                        ->like('locals', 'IRN', 'after')
                        ->where('ok','F')->where('inicio >','2017-01-01')
                        ->orderby('locals ASC, servicos ASC, inicio ASC')->findAll();
        $data['recibosub'] = $results;
        //dd($data);
        return view('recibos/tramitando-rep', $data);
    }

    public function tramitando3()  // ------------ tramitando com vuetify
    {  
        $db = db_connect();          
        $query = $db->query('SELECT recibosub.*, recibo.idc
                             FROM recibosub
                             INNER JOIN recibo ON recibo.id = recibosub.idRec
                             WHERE recibosub.ok = "F" AND recibosub.inicio >= "2017-01-01"
                             ORDER BY recibosub.inicio DESC, recibosub.locals ASC, recibosub.servicos ASC');                
        $results = $query->getResultArray();
        $data['recibosub'] = $results;
        //dd($data);
        return view('recibos/tramitando3', $data);
    }

    public function tramitando5()  // ------------ report das conservatorias
    {  
        $cli = new RecibosubModel();
        $results = $cli->select('*')->orderBy('locals', 'servicos','inicio')
                        ->like('locals', 'IRN Coimbra', 'after')
                        ->where('ok','F')->where('inicio >','2017-01-01')
                        ->orderby('servicos ASC, inicio ASC')->findAll();
        $data['recibosub'] = $results;
        //dd($data);
        return view('recibos/tramitando5', $data);
    }

    public function tramitando5b()  // ----------------------- tramitando json
    {
        $db = db_connect();          
        $query = $db->query('SELECT recibosub.*, recibo.idc
                             FROM recibosub
                             INNER JOIN recibo ON recibo.id = recibosub.idRec
                             WHERE recibosub.locals LIKE "IRN Coimbra" AND recibosub.ok = "F" AND recibosub.inicio >= "2017-01-01"
                             ORDER BY recibosub.inicio DESC ');                
        $results = $query->getResultArray();
        $data['recibosub'] = $results;
        //dd($data);
        return view('recibos/tramitando5', $data);
        echo json_encode($results);
    }

    public function tramitando8()  // ------------ report por serviços
    {  
        $cli = new RecibosubModel();
        $results = $cli->select('*')
                        ->like('locals', 'IRN', 'after')
                        ->where('ok','F')->where('inicio >','2017-01-01')
                        ->orderby('servicos ASC, inicio ASC, locals ASC')->findAll();
        $data['recibosub'] = $results;
        //dd($data);
        return view('recibos/tramitando-rep', $data);
    }

// =========== S  E  R  V  I  Ç  O  S        ===============================================

    public function servicos()  
    {  
        $db = db_connect();          
        $query   = $db->query("SELECT * FROM servicos ORDER BY id DESC");
        $results = $query->getResultArray();
        $data['obj'] = $results;
        //dd($data);
        return view('recibos/servicos', $data);
    }
    
// =========== R  E  L  A  T  Ó  R  I  O  S  ==============================================

    public function processos_old()  // ----------------------- tramitando ---------------------
    {
        $dados = new RecibosubModel();
        $data['contatos'] = $dados->orderBy('idc', 'DESC')->findAll();
        dd($data);
        //return view('contatos/list', $data);
    }
    
    public function lab()  //  ----------------------------------- L A B ---------------------
    {  
        $userModel = new RecibosModel();
        $data['contatos'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('contatos/add_lab', $data);
    }

    public function jsonapi()  // -------- json -----
    {  
        $db = db_connect();          
        $query   = $db->query("SELECT * FROM recibosub ORDER BY id DESC");
        $results = $query->getResultArray();
        foreach($results as $x){ $result[] = [$x['id'], $x['nome']]; }
        $dados = ['data' => $result];
        //dd($dados);
        echo json_encode($dados);
    }

    public function index4()
    {   
        $db = db_connect(); 
        $query = $db->query('SELECT * FROM recibo ORDER BY id DESC');
        echo "<pre>";
	    print_r($query->getResult());
    }

    public function index3()
    {   
        $db = db_connect(); 
        $query = $db->query('SELECT * FROM recibo ORDER BY id DESC');
        $result = $query->getResult();
        //dd($result);
        foreach ($result as $rec) 
        {
            echo $rec->nome; // access attributes
            echo $rec->id;
            echo $rec->dataf; 
        };
        dd($rec);
        return view('recibos/list2',$rec); 
        #echo "<pre>";
        #echo json_encode($result);
        #echo "<pre>";
	    #print_r($query->getResult());   
    }
    
    public function index2()  // ------------------------  show users list
    {
        $xModel = new RecibosModel();
        $data['recibos'] = $xModel->orderBy('id', 'DESC')->findAll();
        dd($data);
        return view('recibos/list2', $data);
    }

    public function index1()  // ------------------------  show users list
    {
        $db = db_connect();          
        $query   = $db->query("SELECT * FROM recibo ORDER BY id DESC");
        $results = $query->getResultArray();
        $data['recibos'] = $results;
        #dd($data);
        return view('recibos/list2', $data);    
    }

    public function total()  // ------------------ somar o total de todos os recibos
    {       
        $xRecibo = new RecibosModel();
        $recibos = $xRecibo->findAll();
        foreach($recibos as $x)
        {   
            $thon = 0;
            $tcus = 0;
            $idx = $x['id'];
            $xsub = new RecibosubModel();
            $subs = $xsub->where('idRec',$idx)->findAll();

            foreach($subs as $y){ $thon += $y['honorarios']; $tcus += $y['custas'];};
                $ttot = $thon + $tcus;
                $datar = [
                    'tothonorarios' => $thon,
                    'totcustas'  => $tcus,
                    'total'  => $ttot
                ];
                $xRecibo->update($idx, $datar);
        }
        return $this->response->redirect(site_url('/recibos/'));   
    }

// =========== R  E  C  I  B  O  P  G  T ======================================================

    public function recibopgta($idc = null)  // -----------------form inclusão recibosub
    {
        $db = db_connect();          
        $query = $db->query("SELECT * FROM recibopgt WHERE idRec = $idc ORDER BY id ASC");
        $results = $query->getResultArray();
        $data['recibopgt'] = $results;
        //dd($data);
        
        $query2 = $db->query("SELECT nome, id FROM recibo WHERE id = $idc");
        $results2 = $query2->getResultArray();
        $data['recibo'] = $results2;

        $query3 = $db->query("SELECT descricao FROM servicos ORDER BY descricao ASC");
        $results3 = $query3->getResultArray(); 
        $data['servico'] = $results3;
        return view('recibos/recibopgt-add', $data);
    }

    public function recibopgts()  // ------------------ store recibopgt
    {
        $xModel = new RecibopgtModel();
        $data = [
            'idRec'  => $this->request->getVar('fidrec'),  
            'venct' => $this->request->getVar('fvencto'),
            'serv' => $this->request->getVar('fservico'),
            'valor'  => $this->request->getVar('fvalor'),
            'iva'  => $this->request->getVar('fiva'),
            'tipo'  => $this->request->getVar('ftipo'),
            'repete'  => $this->request->getVar('frepete'),
            'nome'  => $this->request->getVar('fnome'),
            'total'  => $this->request->getVar('fvalor')+$this->request->getVar('iva'),
            //'pgtoIVA'  => $this->request->getVar('fpgto')             
        ];
        //dd($data);
        $xModel->insert($data);
        $id = $this->request->getVar('fidrec'); //dd($id);
        return $this->response->redirect(site_url('recibo'.'/'.$id));
    }

    public function recibopgte($id = null) // ------------------- edit page recibosub
    {
        {
            $xModel = new RecibopgtModel();
            $dados = $xModel->where('id', $id)->first();
            $data['recibopgt'] = $dados;
            //dd($data);
            return view('recibos/recibopgt-edt', $data);
        }
    }    

    public function recibopgtu()  // --------------------------- update recibosub
    {       
        $xModel = new RecibopgtModel();
        $repete = $this->request->getVar('frepete');
        $vencto = $this->request->getVar('fvencto');
        $pgto = $this->request->getVar('fpgto'); 
        $venc = new \DateTime($vencto);
        if ($pgto != null) 
        { 
          if ($repete != "não") 
          { 
            if ($repete == "semestral") { $venc->add(new \DateInterval("P6M")); }
            if ($repete == "anual") { $venc->add(new \DateInterval("P12M")); }
            $datax = [
                'idRec'  => $this->request->getVar('fidrec'),  
                'venct' => $venc->format('Y/m/d'),
                'serv' => $this->request->getVar('fserv'),
                'valor'  => $this->request->getVar('fvalor'),
                'iva'  => $this->request->getVar('fiva'),
                'tipo'  => $this->request->getVar('ftipo'),
                'repete'  => $this->request->getVar('frepete'),
                'total'  => $this->request->getVar('fvalor')+$this->request->getVar('iva'),
                'nome'  => $this->request->getVar('nome'),
                'pgtoIVA'  => null
            ];
            $xModel->insert($datax);
          }
          else
          {
            $venc->format('Y/m/d'); ;
          }
        }        
        $data = [
            'idRec'  => $this->request->getVar('fidrec'),  
            'venct' => $this->request->getVar('fvencto'),
            'servicos' => $this->request->getVar('fs'),
            'valor'  => $this->request->getVar('fvalor'),
            'iva'  => $this->request->getVar('fiva'),
            'tipo'  => $this->request->getVar('ftipo'),
            'repete'  => $this->request->getVar('frepete'),
            'total'  => $this->request->getVar('fvalor')+$this->request->getVar('iva'),
            'pgtoIVA'  => $this->request->getVar('fpgto')
        ];
        //dd($data);
        $id = $this->request->getVar('fid');
        //dd($id);
        $xModel->update($id, $data);
        $idrec = $this->request->getVar('fidrec');
        return $this->response->redirect(site_url('recibo/'.$idrec));
    }
 
    public function recibopgtdel($id = null, $idrec = null) // ------------------ deletar recibopgt
    {
        $xModel = new RecibopgtModel();
        $data['recibosub'] = $xModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/recibo/'.$idrec));
    }

    public function parcelar($id = null, $idrec = null) // ------------------ parcelas automáticas
    {
        $xRecibo = new RecibosModel();
            $recibo = $xRecibo->where('id', $idrec)->first();
            $dataf = $recibo['dataf'];
            $hon = $recibo['tothonorarios'];
            $emo = $recibo['totcustas'];
            $nom = $recibo['nome'];
            $tip = $recibo['tipo_pgto'];
            $valor_parc = $hon / $tip;
            $iva = $recibo['iva'];
            if ($iva === null) {$iva = 0;}
            $total = $valor_parc + $iva;
            $idc = $recibo['idc'];
            $controle = 1;
            $soma_valor_parc = 0;
            $data_atual = new \DateTime($dataf);
            $xRecibopgt = new RecibopgtModel();   
        // 1a parcela de honorario    
        $data = [
                 'idRec' => $idrec, 
                 'venct' => $data_atual->format('Y/m/d'),
                 'nome' => $nom,  
                 'tipo' => 'honorários', 
                 'valor' => number_format($valor_parc, 2, '.', ''),
                 'iva' => $iva,
                 'total' => $total,
                ];
        $xRecibopgt->insert($data);    
            
        while ($controle <= $tip-1) {
        $data_atual->add(new \DateInterval("P1M"));  // Somar um mês na data
        // Acessa o IF quando é última parcela para corrigir o valor da compra
        if ($controle == $tip) {
            $valor_ultima_parc = $valor_parc - $soma_valor_parc;  // corrigir a diferença 
            $data = ['idRec' => $idrec, 'venct' => $data_atual->format('Y/m/d'), 'tipo' => 'honorários', 'valor' => $valor_parc, 'iva' => $iva,'total' => $total, 'nome' => $nom];
            $xRecibopgt->insert($data);
        } else {
            $valor_ultima_parc = $hon - $soma_valor_parc; 
            $data = ['idRec' => $idrec, 'venct' => $data_atual->format('Y/m/d'), 'tipo' => 'honorário', 'valor' => $valor_parc, 'iva' => $iva,'total' => $total, 'nome' => $nom];
            $xRecibopgt->insert($data);
            $soma_valor_parc += number_format($valor_parc, 2, '.', '');  // Somar o valor das parcelas
        }
        $controle++;  // Incrementar a variável após imprimir a parcela
        }
        $data2 = ['idRec' => $idrec, 'venct' => $data_atual->format('Y/m/d'), 'tipo' => 'emolumento', 'valor' => $emo,'iva' => $iva, 'total' => $emo, 'nome' => $nom];
        $xRecibopgt->insert($data2);
        return $this->response->redirect(site_url('/recibo/'.$idrec));
    }

}