<?php 
namespace App\Models;
use CodeIgniter\Model;

class RecibosModel extends Model
{
    protected $table = 'recibo';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idc','dataf', 'prestador','nome','fatura','tipo_pgto','obs','tothonorarios','totcustas','total','iva','parceria','valor'];

    // Dates
    //protected $useTimestamps = false;
}