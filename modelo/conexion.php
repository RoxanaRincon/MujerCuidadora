<?php


class Conexion{

    public static function conectar(){
        // Datos de conexión a la base de datos
        $host = 'localhost'; 
        $dbname = 'mujere';
        $username = 'root';
        $password = '';

        try {
            
            $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

            // Configurar manejo de errores de PDO a excepciones
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Opcional: Establecer el juego de caracteres a UTF-8
            $db->exec("SET NAMES utf8"); 
           

        } catch (PDOException $e) {
            // En caso de error, mostrar un mensaje de error y terminar la ejecución del script
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }

        return $db;

    }
    
}


