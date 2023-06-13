<?php

require_once("./db/AccesoDb.php");

class Usuario {

    public $id;
    public $nombre;
    public $clave;
    public $mail;
    public $rol;

    public function __construct() {}

    public function guardarUsuario()
    {
        $accesoDb = AccesoDB::obtenerInstancia();
        $consulta = $accesoDb->prepararConsulta("INSERT INTO usuarios (nombre, clave, mail, rol) VALUES (:nombre, :clave, :mail, :rol)");
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $consulta->bindValue(':rol', $this->rol, PDO::PARAM_STR);
    
        $consulta->execute();
     
    }

    public static function obtenerTodos()
    {
        $accesoDb = AccesoDb::obtenerInstancia();
        $consulta = $accesoDb->prepararConsulta("SELECT * FROM usuarios");
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuario');

    }
        
        


      
    
    

}


?>