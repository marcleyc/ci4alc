<?php 
namespace App\Models;
use CodeIgniter\Model;
class CrudModel extends Model
{
    protected $table = 'contatos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'email'];

    // Dates
    protected $useTimestamps = false;
}