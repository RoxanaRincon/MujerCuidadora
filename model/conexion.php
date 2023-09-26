<php

class Conexion{

    public static funtion Conectar(){

        $host='localhost';
        $dbname='';
        $username='root';
        $password='';

        try{

            $db= new PDO("mysql:host=$host;dbname=$dbname");

        }catch (){

        }

    }

    

    
}