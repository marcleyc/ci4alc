<?php 
namespace App\Models;
use CodeIgniter\Model;

class ReclocalModel extends Model
{
    protected $table = 'recprocesslocal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','locals'];

    // Dates
    //protected $useTimestamps = false;
}