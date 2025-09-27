<?php

namespace App\Controllers;

use App\Models\Publisher;

class TareaController extends BaseController
{

    //EJERCICIO 01
    public function pdf(): string
    {
        return view('tarea06/pdf');
    }

    //EJERCICIO 02
    public function grafico1(): string
    {
        $publisher=new Publisher();
        $datos['publisher_name']=$publisher->orderBy('id','ASC')->findAll();
        return view('tarea06/grafico1',$datos);
    }

    //EJERCICIO 03
    public function grafico2(): string
    {
        return view('tarea06/grafico2');
    }


}
