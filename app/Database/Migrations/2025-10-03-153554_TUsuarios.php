<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TUsuarios extends Migration
{
 public function up()
    {
        //Definir los campos de la tabla
        $this->forge->addField([
            "id"=> [
                "type"=> "INT",
                "constraint"=> 11,
                "unsigned"=> true,
                "auto_increment"=> true
            ],
            "apellidos"=>[
                "type"=> "VARCHAR",
                "constraint"=> "40",
                "null"=> false
            ],
            "nombres"=>[
                "type"=> "VARCHAR",
                "constraint"=> "40",
                "null"=> false
            ],
            "nomusuario"=>[
                "type"=> "VARCHAR",
                "constraint"=> "40",
                "null"=> false
            ],
            "claveacceso"=>[
                "type"=> "VARCHAR",
                "constraint"=> "70",
                "null"=> false
            ],
            "nivelacceso"=>[
                "type"=> "ENUM",
                "constraint"=> ['ADMIN','USER'],
                'default'=> 'USER'
            ],
            "create_at"=>[
                "type"=> "DATETIME",
                "null"=> false,
            ],
            "update_at"=>[
                "type"=> "DATETIME",
                "null"=> true,
            ]
        ]);
        //Definir la clave primaria
        $this->forge->addKey('id',true);
        //restricciones(constraint)
        $this->forge->addKey('nomusuario',false,true,'uk_nomusuario');
        //creación de tabla
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        //5.roolback(desahacer los cambios)
        $this->forge->dropTable('usuarios');
    }
}
