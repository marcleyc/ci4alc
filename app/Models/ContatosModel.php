<?php 
namespace App\Models;
use CodeIgniter\Model;
class ContatosModel extends Model
{
    protected $table = 'contatos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'email'];

    // Dates
    protected $useTimestamps = false;
}