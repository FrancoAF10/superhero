<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SUsuarios extends Seeder
{
    public function run()
    {
        //registros
        $data=[
            [
                "apellidos"=> "Anton Felix",
                "nombres"=> "Gian Franco",
                "nomusuario"=> "afgian",
                "claveacceso"=> password_hash("admin789*", PASSWORD_DEFAULT),
                "nivelacceso"=> "ADMIN",
                "create_at"=> date("Y-m-d H:i:s"),
                "update_at"=> null
            ],
            [
                "apellidos"=> "Pinedo Silva",
                "nombres"=> "Valeria Alessandra",
                "nomusuario"=> "psvaleria",
                "claveacceso"=> password_hash("user789*", PASSWORD_DEFAULT),
                "nivelacceso"=> "USER",
                "create_at"=> date("Y-m-d H:i:s"),
                "update_at"=> null
            ]
        ];

        //insertar en la tabla
        $this->db->table("usuarios")->insertBatch($data);
    }
}
