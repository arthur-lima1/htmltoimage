<?php

namespace App\Common;

class Environment
{

    /**
     * Carrega as variaveis de ambiente
     */
    public static function load($dir)
    {
        //VERIFICA SE O .ENV EXISTE
        if (!file_exists($dir . '/.env')) {
            return false;
        }

        // $lines = file($dir.'/.env');
        // foreach ($lines as $line) {
        //     echo json_encode($line);
        //     putenv(trim($line));
        // }

        // echo json_encode(getenv());
        // echo json_encode(getenv('API_KEY'));

    }
}
