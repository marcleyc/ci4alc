<?php 
namespace App\Models;
use CodeIgniter\Model;

class RecibopgtModel extends Model
{
    protected $table = 'recibopgt';
    protected $primaryKey = 'id';
    //protected $returnType  = 'object';
    protected $allowedFields = ['id','idRec','venct','valor','iva','total','tipo','nrecpg','pgtoIVA','repete'];
}