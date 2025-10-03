<?php

namespace App\Models;
use CodeIgniter\Model;

class Usuario extends Model{
protected $table = "usuarios";  

//campos de auditoria
protected $createdField='create_at';
protected $updatedField='update_at';

/**
 * retorna el registro del nombre del usuario indicado
 * @param mixed $nomususario
 * @return void
 */

  public function getUser($nomusuario=''): array|object|null{
    $usuario=$this->where('nomusuario',$nomusuario)->first();
    return $usuario;
  }
}