<?php 
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class ExtratoModel extends Model
{
    protected $table = 'students';
    protected $allowedFields = [
        'data', 
        'banco', 
        'descricao',
        'valor',
        'saldo',
        'tipo',
    ];
}