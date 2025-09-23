<?php
namespace App\Models;
use CodeIgniter\Model;

class Raza extends Model{
  protected $table = "race";
  //protected $primaryKey = ""; solo se usa para en caso de llamar el id para acciones(eliminar)
  protected $allowedFields = ['id','race'];
}