<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\ClientesModel;
use App\Models\RecibosModel;
use App\Models\RecibosubModel;
  
class ProfileController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $session = session();
        //echo "Hello : ".$session->get('name');
        $data['name'] = $session->get('name'); //dd($data);
        
        // dados para bonjour --------------------------------------------------
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
        $query2 = $db->query('SELECT dataf, nome, total
                             FROM recibo
                             WHERE dataf >= "2017-01-01" AND MONTH(dataf) = MONTH(CURRENT_DATE) AND YEAR(dataf) = YEAR(CURRENT_DATE)
                             ORDER BY dataf DESC');
        $data['recibos'] = $query2->getResultArray();                                    

        // total das vendas mensais
        $totalvenda = $query2->getResultArray();
        $data['totalv'] = array_sum ( array_column($totalvenda, 'total') );  //dd($data);

        // tramitando
        $db = db_connect();          
        $query3 = $db->query('SELECT COUNT(recibosub.inicio) AS qtd
                             FROM recibosub
                             INNER JOIN recibo ON recibo.id = recibosub.idRec
                             WHERE recibosub.locals LIKE "IRN%" AND recibosub.ok = "F" AND recibosub.inicio >= "2017-01-01" ');                
        $result = $query3->getResultArray(); 
        $data['tramitando'] = $result[0]['qtd'];

        return view('bonjour',$data);
    }
}