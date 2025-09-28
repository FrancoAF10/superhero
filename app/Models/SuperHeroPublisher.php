<?php
  namespace App\Models;
  use CodeIgniter\Model;

  class SuperHeroPublisher extends Model{
    protected $table = "superhero SH";
    protected $primaryKey = "id";
    protected $returnType = "array";
    protected $allowedFields = [];

  public function getsuperHeroByPublisher($publisher_id){

    return $this->select('PB.publisher_name, COUNT(SH.publisher_id) AS Total')
    ->join('publisher PB','PB.id= SH.publisher_id','left')
    ->whereIn('PB.id',$publisher_id)
    ->groupBy('PB.publisher_name')
    ->findAll();
  }
  public function getAverageWeightBySuperHero(){
    return $this->select('PB.publisher_name, AVG(SH.weight_kg) AS Total')
    ->join('publisher PB','PB.id= SH.publisher_id','left')
    ->groupBy('PB.publisher_name')
    ->orderBy('Total','ASC')
    ->findAll();
  }
}
