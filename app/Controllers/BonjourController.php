<?php 
namespace App\Controllers;
use App\Models\ClientesModel;
use App\Models\RecibosModel;
use App\Models\RecibosubModel;
use App\Models\FinanceiroModel;
use CodeIgniter\Controller;

class BonjourController extends Controller
{
    public function index() // ------------------------- list dashboard
    {  
        $dataModel = new ClientesModel();
        $data['clientesp'] = $dataModel->select('idc,nome')->findAll(); 
        
        // A receber nesse mês
        $db = db_connect();          
        $query = $db->query('SELECT * 
                             FROM recibopgt
                             WHERE MONTH(venct) = MONTH(CURRENT_DATE) AND YEAR(venct) = YEAR(CURRENT_DATE)
                             ORDER BY venct ASC ');                                    
        $data['areceber'] = $query->getResultArray(); 
        $db->close();

        // total do a receber nesse mês
        $valores = $query->getResultArray();
        $data['total'] = array_sum ( array_column($valores, 'total') );
        
        // vendas do mês
        $db = db_connect();          
        $query2 = $db->query('SELECT id, dataf, nome, total
                             FROM recibo
                             WHERE dataf >= "2017-01-01" AND MONTH(dataf) = MONTH(CURRENT_DATE) AND YEAR(dataf) = YEAR(CURRENT_DATE)
                             ORDER BY dataf DESC');
        $data['recibos'] = $query2->getResultArray();                                    

        // total das vendas mensais
        $totalvenda = $query2->getResultArray();
        $data['totalv'] = array_sum ( array_column($totalvenda, 'total') );  

        // tramitando
        $db = db_connect();          
        $query3 = $db->query('SELECT COUNT(recibosub.inicio) AS qtd
                             FROM recibosub
                             INNER JOIN recibo ON recibo.id = recibosub.idRec
                             WHERE recibosub.locals LIKE "IRN%" AND recibosub.ok = "F" AND recibosub.inicio >= "2017-01-01" ');                
        $result = $query3->getResultArray(); 
        $data['tramitando'] = $result[0]['qtd']; //dd($data);

        return view('bonjour',$data);
    }

    public function global($id = null) // ---- global clientes pelo IDC 
    {
        $dataModel = new ClientesModel();
        $data['clientesp'] = $dataModel->select('idc,nome')->findAll(); 

        $dataModel = new ClientesModel();
        $data['clientes'] = $dataModel->select('idc,nome')->where('idc', $id)->findAll(); 

        $dataModel2 = new RecibosubModel(); // Processos
        $data['processos'] = $dataModel2->select('recibosub.*')
                                         ->join('recibo', 'recibo.id = recibosub.idRec')
                                         ->where('recibo.idc',$id)
                                         ->orderby('inicio DESC')->findAll();

        $dataModel3 = new FinanceiroModel();  // a Receber
        $data['financeiro'] = $dataModel3->select('dataf,historico,numero,valor')->where('cliente', $id)->findAll();                                 
        //dd($data);                                                
        //echo json_encode($data); 
        return view('bonjour-global', $data);
    }

    public function global2($id = null) // ---- global clientes pelo IDC 
    {
        $dataModel = new ClientesModel();
        $data['clientes'] = $dataModel->select('nome')->where('idc', $id)->findAll();

        $dataModel2 = new RecibosubModel();
        $data['processos'] = $dataModel2->select('recibosub.*')
                                         ->join('recibo', 'recibo.id = recibosub.idRec')
                                         ->where('recibo.idc',$id)
                                         ->orderby('inicio DESC')->findAll();
                
        //echo json_encode($data); 
        return view('bonjour-global2', $data);
    }
    
    public function main() // ------------------------- list dashboard
    {  
        $dataModel = new ClientesModel();
        $data['clientesp'] = $dataModel->select('idc,nome')->findAll();
        return view('main',$data);
    }
}