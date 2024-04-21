<?php 
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class ExtratotipoModel extends Model
{
    protected $table = 'extratotipo';
    protected $allowedFields = [
        'id', 
        'ttipo', 
        'tdescricao',
    ];
}