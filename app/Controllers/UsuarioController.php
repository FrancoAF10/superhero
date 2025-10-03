<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Usuario;
class UsuarioController extends BaseController
{
    public function login()
    {

      //sesiones flash-> 1 solicitud
      $session=session();

      $usuario=new Usuario();

      //recuperamos el nombre y la contraseña escrito en el formulario
      $nombreusuario=$this->request->getPost("nomusuario");
      $claveacceso=$this->request->getPost("claveacceso");

      $data=$usuario->getUser($nombreusuario);

      //validar si existe el usuario
      if(!$data){
        $session->setFlashdata("error_nomuser","No existe el usuario ".$nombreusuario);
         return redirect()->to(base_url());
      }

      //si llegamos hasta aqui, es porque si existe el registro
      //validamos la contraseña
      $claveEncriptada=$data["claveacceso"];
      
      if(!password_verify($claveacceso,$claveEncriptada)){
        $session->setFlashdata("error_password","clave incorrecta") ;
        return redirect()->to(base_url());
      }

      return redirect()->to(base_url('/dashboard'));
    }
}
