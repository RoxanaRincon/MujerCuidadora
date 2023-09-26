<?php

class Conexion{

    public static function Conectar(){

        $host='localhost';
        $dbname='';
        $username='root';
        $password='';

        try{

            $db= new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

            $db->setAtrribute(PDO::ATTR_ERMODE, PDO::ERRMODE_EXCEPTION); 

            $db->exce("SET NAMES utf8");

        }catch (PDOException $e){
            die("Error de Conexion: ".$e->getmessage());
        }
        return $db;
    }

}