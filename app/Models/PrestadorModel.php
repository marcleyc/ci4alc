<?php 
namespace App\Models;
use CodeIgniter\Model;

class PrestadorModel extends Model
{
    protected $table = 'prestador';
    protected $primaryKey = 'ID';
    //protected $returnType  = 'object';
    protected $allowedFields = ['ID','nomep'];
}