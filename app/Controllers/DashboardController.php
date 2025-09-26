<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ReporteAlignment;
use App\Models\ReportePublisher;

class DashboardController extends BaseController{
  public function getInforme1(){
    return view("dashboard/informe1");
  }
  public function getInforme2(){
    return view("dashboard/informe2");
  }
  public function getInforme3(){
    return view("dashboard/informe3");
  }
  public function getInforme4(){
    return view("dashboard/informe4");
  }
  
  
  //Retorna JSON que requiere la vista 
  public function getDataInforme2(){
    
    $this->response->setContentType("application/json");

    $data=[
      ["superhero"=>"Goku","popularidad"=>100],
      ["superhero"=>"Krilin","popularidad"=>35],
      ["superhero"=>"Luffy","popularidad"=>70],
      ["superhero"=>"Pucca","popularidad"=>40],
      ["superhero"=>"Spiderman","popularidad"=>30],
      ["superhero"=>"Zoro","popularidad"=>60]
    ];
    //En caso de no encontrar datos
    if(!$data){
      return $this->response->setJSON([
        'success'=>false,
        'message'=> 'No Encontramos super héroes',
        'resumen'=>[]
      ]);
    }

    sleep(3);
    //Cuando si encontramos datos si enviamos el JSON
    return $this->response->setJSON([
      'success'=>true,
      'message'=> 'Popularidad',
      'resumen'=>$data
    ]);
  }

  public function getDataInforme3(){
    $this->response->setContentType("application/json");
    $reportAligment= new ReporteAlignment();//Modelo

    $data=$reportAligment->findAll();

      
    if(!$data){
      return $this->response->setJSON([
        'success'=>false,
        'message'=> 'No Encontramos super héroes',
        'resumen'=>[]
      ]);
    }
    //Cuando si encontramos datos si enviamos el JSON
    return $this->response->setJSON([
      'success'=>true,
      'message'=> 'Alineaciones',
      'resumen'=>$data
    ]);
  }

  public function getDataInforme3Cache(){
    $this->response->setContentType("application/json");
    //clave unica= identificar al conjunto de datos
    $cacheKey='resumenAlignment';
    //obtener datos de la memoria cache
    $data=cache($cacheKey);

    
    if($data===null){
      $reportAligment= new ReporteAlignment();//Modelo
      $data=$reportAligment->findAll();

      //escribir la nueva memoria cache
      cache()->save($cacheKey,$data,3600);//hora
    }
      
    if(!$data){
      return $this->response->setJSON([
        'success'=>false,
        'message'=> 'No Encontramos super héroes',
        'resumen'=>[]
      ]);
    }
    //Cuando si encontramos datos si enviamos el JSON
    return $this->response->setJSON([
      'success'=>true,
      'message'=> 'Alineaciones',
      'resumen'=>$data
    ]);
  }

  public function getDataInforme4Cache(){
    $this->response->setContentType("application/json");

    $cacheKey='resumenPublisher';
    $data=cache($cacheKey);
    if($data===null){
      $reportPublisher= new ReportePublisher();//Modelo
      $data=$reportPublisher->findAll();
      cache()->save($cacheKey,$data,3600);
    }
    if(!$data){
      return $this->response->setJSON([
        'success'=>false,
        'message'=> 'No Encontramos super héroes',
        'resumen'=>[]
      ]);
    }
    //Cuando si encontramos datos si enviamos el JSON
    return $this->response->setJSON([
      'success'=>true,
      'message'=> 'Alineaciones',
      'resumen'=>$data
    ]);
  }
}