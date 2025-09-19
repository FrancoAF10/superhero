<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use Exception;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
class ReporteController extends BaseController{

  protected $db;

  public function __construct(){
    $this->db= \Config\Database::connect();
  }
  public function getReport1(){
    $html=view("reportes/reporte1");//Datos a convertir en pdf
    $html2pdf= new Html2Pdf();//libreria
    $html2pdf->writeHTML($html);//contenido
    //Definir el tipo de archivo que deberá renderizar la vista(navegador)

    $this->response->setHeader("Content-Type","application/pdf");
    $html2pdf->Output();//generación
  }

  public function getReport2(){
    $data=[
      "area"=> "Finanzas",
      "autor"=> "Gian Franco Anton Felix",
      "productos"=> [
        ["id"=>1,"descripcion"=>"Monitor","precio"=> 750],
        ["id"=>2,"descripcion"=>"Impresora","precio"=> 500],
        ["id"=>3,"descripcion"=>"WebCam","precio"=> 250],
      ],
      "estilos"=>view("reportes/estilos"),
    ];

    $html=view("reportes/reporte2",$data);

    try{

      $html2PDF=new Html2Pdf('P','A4','es',true, 'UTF-8',[10,10,10,10]);
      $html2PDF->writeHTML($html);

      $this->response->setHeader('Content-Type','application/pdf');
      $html2PDF->Output('Reporte-Finanzas.pdf');

    }catch(Html2PdfException $e){
      $html2PDF->clean();
      $formatter= new ExceptionFormatter($e);
      echo $formatter->getMessage();
    }
  }

  public function getReport3(){

    
    $query="
          SELECT 
          SH.id,
          SH.superhero_name,
          SH.full_name,
          PB.publisher_name,
          AL.alignment
          FROM superhero SH
          LEFT JOIN publisher PB ON SH.publisher_id=PB.id
          LEFT JOIN alignment AL ON SH.alignment_id=AL.id
          ORDER BY 4
          LIMIT 100;
    ";
    $rows=$this->db->query($query);
    $data=["rows"=>$rows->getResultArray(),
            "estilos"=>view("reportes/estilos")];

    $html=view("reportes/reporte3",$data);

    try{
      // P=Vertical, L=Horizontal
      $html2PDF=new Html2Pdf('P','A4','es',true, 'UTF-8',[10,10,10,10]);
      $html2PDF->writeHTML($html);

      $this->response->setHeader('Content-Type','application/pdf');
      $html2PDF->Output('Reporte-SuperHero.pdf');

    }catch(Html2PdfException $e){
      $html2PDF->clean();
      $formatter= new ExceptionFormatter($e);
      echo $formatter->getMessage();
    }
  }
  public function filtro(){
    $query="
            SELECT
                SH.id,
                SH.superhero_name,
                SH.full_name,
                PB.publisher_name,
                AL.alignment
              FROM superhero SH
              JOIN publisher PB ON SH.publisher_id = PB.id
              JOIN alignment AL ON SH.alignment_id = AL.id
              WHERE SH.id IN (
                SELECT MIN(SH2.id)
                FROM superhero SH2
                GROUP BY SH2.publisher_id
              )
              ORDER BY PB.publisher_name;
    ";

    $rows=$this->db->query($query);
    $data=["rows"=>$rows->getResultArray(),
            "estilos"=>view("reportes/estilos")];
    return view("reportes/filtro",$data);
  }

  public function getReport4(){
    $publisher = $this->request->getGet('publisher_name'); // obtener parámetro de GET

      
      $query="
            SELECT 
            SH.id,
            SH.superhero_name,
            SH.full_name,
            PB.publisher_name,
            AL.alignment
            FROM superhero SH
            LEFT JOIN publisher PB ON SH.publisher_id=PB.id
            LEFT JOIN alignment AL ON SH.alignment_id=AL.id
            WHERE PB.publisher_name = ?
            ORDER BY 4
            LIMIT 100;
      ";
      $rows=$this->db->query($query,[$publisher]);
      
      $data=["rows"=>$rows->getResultArray(),
              "estilos"=>view("reportes/estilos")];

      $html=view("reportes/reporte4",$data);

      try{
        // P=Vertical, L=Horizontal
        $html2PDF=new Html2Pdf('P','A4','es',true, 'UTF-8',[10,10,10,10]);
        $html2PDF->writeHTML($html);

        $this->response->setHeader('Content-Type','application/pdf');
        $html2PDF->Output('Reporte-SuperHero.pdf');

      }catch(Html2PdfException $e){
        $html2PDF->clean();
        $formatter= new ExceptionFormatter($e);
        echo $formatter->getMessage();
      }
    }
}