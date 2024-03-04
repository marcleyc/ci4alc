<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
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
        $data = $session->get('name'); //dd($data);
        return view('clientes/list');
    }
}