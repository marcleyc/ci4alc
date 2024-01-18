<?php 
namespace App\Models;
use CodeIgniter\Model;
class ContatosModel extends Model
{
    protected $table = 'contatos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['datac','nome', 'email','status','indicacao','obs','honorarios','cli'];

    // Dates
    protected $useTimestamps = false;
}