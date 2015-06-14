<?php
class Conexion extends MySQLi{
    private static $instancia = null;
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = 'admin';
    const DATABASE = 'it-retail';
    
    private function __construct($host, $user, $password, $database){
        parent::__construct($host, $user, $password, $database);
    }
    
    public static function obtenerInstancia(){
        if (self::$instancia == null) {
            self::$instancia = new self(self::HOST, self::USER, self::PASSWORD, self::DATABASE);
            self::$instancia->query("SET NAMES 'utf-8'");
        }
        return self::$instancia;
    }
}
?>