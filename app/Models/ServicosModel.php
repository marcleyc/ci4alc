<?php 
namespace App\Models;
use CodeIgniter\Model;

class ServicosModel extends Model
{
    protected $table = 'servicos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'descricao','honorarios','emolumentos','total','obs','pdf'];

    // Dates
    protected $useTimestamps = false;
}