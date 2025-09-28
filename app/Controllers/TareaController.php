<?php

namespace App\Controllers;

use App\Models\Publisher;
use App\Models\Superhero;
use App\Models\SuperHeroPublisher;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
class TareaController extends BaseController
{

    //EJERCICIO 01 VISTA
    public function pdf(): string
    {
        return view('tarea06/pdf');
    }
    //EJERCICIO 01 GENERACIÓN DE PDF
    public function generarpdf() {
        $superhero = new Superhero();

        $titulo = $this->request->getPost('titulo');
        $gender_ids = $this->request->getPost('gender_id'); 
        $limite = (int) $this->request->getPost('limite');

        if (!is_array($gender_ids)) {
            $gender_ids = $gender_ids ? [$gender_ids] : [];
        }

        $heroes = [];
        if (!empty($gender_ids)) {
            foreach ($gender_ids as $gid) {
                $hero = $superhero->getSuperHeroByGender([$gid]); 
                if ($limite > 0) {
                    $hero = array_slice($hero, 0, $limite);
                }
                $heroes = array_merge($heroes, $hero); 
            }
        }

        $data = [
            'titulo' => $titulo,
            'superheros' => $heroes,
            'estilos' => view('reportes/estilos')
        ];

        $html = view('tarea06/pdfgenerado', $data);

        try {
            $html2PDF = new Html2Pdf('P','A4','es',true,'UTF-8',[10,10,10,10]);
            $html2PDF->writeHTML($html);

            $this->response->setHeader('Content-Type','application/pdf');
            $html2PDF->Output('Reporte-Gender.pdf');

        } catch (Html2PdfException $e) {
            $html2PDF->clean();
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getMessage();
        }
    }

    //EJERCICIO 02
    public function grafico1(): string
    {
        $publisher=new Publisher();
        $datos['publisher_name']=$publisher->orderBy('id','ASC')->findAll();
        return view('tarea06/grafico1',$datos);
    }
    public function getgrafico1(){
        $this->response->setContentType("application/json");
        $shpublisher= new SuperHeroPublisher();//Modelo

        $publisher_id = $this->request->getJSON()->publisher_id;
        $data=$shpublisher->getsuperHeroByPublisher($publisher_id);

        
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


    //EJERCICIO 03
    public function grafico2(): string
    {
        return view('tarea06/grafico2');
    }

    public function getgrafico2(){
        $this->response->setContentType("application/json");
        $reportPublisher= new SuperHeroPublisher();//Modelo

        $data=$reportPublisher->getAverageWeightBySuperHero();
        
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
        'message'=> 'Promedio PesoKG por Editora',
        'resumen'=>$data
        ]);
    }
}
