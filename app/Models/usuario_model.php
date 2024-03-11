<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;


class usuario_model extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey       = 'id';
    protected $allowedFields = ['usuario','clave','nombres'];
    

   
}