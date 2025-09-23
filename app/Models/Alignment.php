<?php
namespace App\Models;
use CodeIgniter\Model;

class Alignment extends Model{
  protected $table = "alignment";
  //protected $primaryKey = ""; solo se usa para en caso de llamar el id para acciones(eliminar)
  protected $allowedFields = ['id','alignment'];
}