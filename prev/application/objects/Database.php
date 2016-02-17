<?php
class Database {
        
    // actualizar con los parametros de servidor local
    private $host = "localhost";
    private $dbname = "demo_almacen";
    private $user = "root";
    private $passwd = "root";
    
    private $cn;
    
    function __construct() {
        $this->cn = new PDO(sprintf("mysql:host=%s; dbname=%s",$this->host,$this->dbname),$this->user,$this->passwd);
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->cn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , "SET NAMES 'ISO-8859-1'");        
    }
    
    function query($sql, $params) {
        if (is_array($params)) {
            $rs = $this->cn->prepare($sql);
            try {
                $rs->execute($params);
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        } else {
            $rs = $this->cn->query($sql);
        }
        return $rs;
    }
    
    function execute($sql, $params) {
        $rs = $this->cn->prepare($sql);
        $rs->execute($params);
    }
    
    function lastID() {
        return $this->cn->lastInsertId();
    }
    
    function __destruct() {
        unset ($this->cn);
    }
}

// Objeto Database
$database = new Database();

?>