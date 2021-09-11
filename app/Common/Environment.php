<?php

namespace App\Common;

class Environment
{

    /**
     * Carrega as variaveis de ambiente
     */
    public static function load( string $dir) 
    {
        //VERIFICA SE O .ENV EXISTE
        if (!file_exists($dir . '/.env')) {

            echo json_encode(array('status' => 'error', 'data' => '.env não encontrado'));

            return false;
        }

        $lines = file($dir . '/.env');
        foreach($lines as $line) {
            putenv(trim($line));
        }

    }
}
