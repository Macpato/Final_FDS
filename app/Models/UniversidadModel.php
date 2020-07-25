<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UniversidadModel extends Model
{
    protected $table = 'universidad';
    protected $primaryKey = 'cod_universidad';
    protected $allowedFields = [ 'nombre', 'direccion','web','licencia'];


}