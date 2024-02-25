<?php

namespace App\Controllers;
use App\Models\ContatosModel;
use App\Models\ClientesModel;
use CodeIgniter\Controller;
use \Mpdf\Mpdf;
//use CodeIgniter\API\ResponseTrait;

class ReportController extends BaseController
{
    public function autcontrato($x = null)  // -------------------- php object array to boottable
    {
        $db = db_connect();          
        $query = $db->query("SELECT * FROM recibo WHERE id = $x ORDER BY id DESC LIMIT 1");
        $query2 = $db->query("SELECT * FROM recibosub WHERE idRec = $x ORDER BY id ASC");
        $query3 = $db->query("SELECT * FROM recibopgt WHERE idRec = $x ORDER BY id ASC");
        $results = $query->getResultArray();
        $results2 = $query2->getResultArray();
        $results3 = $query3->getResultArray();
        $datar['recibo'] = $results;
        $datar['recibosub'] = $results2;
        $datar['recibopgt'] = $results3;
        //dd($datar);

        $mpdf = new \Mpdf\Mpdf([
            'pagenumPrefix' => 'Página ',
            'pagenumSuffix' => ' / ',
            'nbpgPrefix' => '',
            'nbpgSuffix' => '',
            'margin_left' => 20,
            'margin_right' => 15,
            'margin_top' => 26,
            'margin_bottom' => 27,
            'margin_header' => 10,
            'margin_footer' => 10,
            //'mode' => 'utf-8'
        ]);
        $htmlh = view('contratos/setheader');
        $mpdf->SetHeader($htmlh, 'O');
        $mpdf->SetFooter('
        <div style=text-align:center;font-size:10px;font-style:normal;font-weight:normal;font-family:Arial;>ESCRITÓRIO DE ADVOCACIA</div>
        <div style=text-align:center;font-size:10px;font-style:normal;font-weight:normal;font-family:Arial;>Praça da República n.o 8, 2ºF, Condeixa-a-Nova, Coimbra, Portugal 3150-127</div>
        <div style=text-align:center;font-size:10px;font-style:normal;font-weight:normal;font-family:Arial;>Advogada Andréa L Carvalho - C.P.: 57281C  +351 911 992 069  andrealevindo@gmail.com</div>
        <div style=text-align:right;font-size:8pt;font-style:normal;>{PAGENO}{nbpg}</div>
        ');
        // ----------------------------------------------- dados
        $dataf = date("Y-m-d");
        $ano = date("Y");
        $num = 174;
        $data['dataf'] = $dataf;
        $data['ano'] = $ano;
        $data['num'] = $num;
        // ----------------------------------------------- add pag body
        $html = view('contratos/contrato1body',$datar);
        $mpdf->WriteHTML($html);
        // ----------------------------------------------- add pag fatura
        $mpdf->AddPage('P');
        $htmlf = view('contratos/contrato1fatura',$data);
        $mpdf->WriteHTML($htmlf); 
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('contrato2.pdf','I'); // Saída do PDF = I:print browser, D:Download  
    }
    
}

