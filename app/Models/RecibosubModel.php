<?php 
namespace App\Models;
use CodeIgniter\Model;

class RecibosubModel extends Model
{
    protected $table = 'recibosub';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idRec','servicos', 'nome','honorarios','custas','total','locals','inicio','nprocesso','codigo','sit','termino','ok','periodicidade','verificado'];

    // Dates
    //protected $useTimestamps = false;
}