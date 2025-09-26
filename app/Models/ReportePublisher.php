<?php
  namespace App\Models;
  use CodeIgniter\Model;

  class ReportePublisher extends Model{
    protected $table = "view_superhero_publisher";
    protected $primaryKey = "publisher_name";
    protected $returnType = "array";
    protected $allowedFields = [];

  }
