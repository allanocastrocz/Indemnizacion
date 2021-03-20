<?php
require_once('conexion.php');
class Consultas
{
    private $pdo;

    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->connect();
    }

    public function __destruct()
    {
        // close the database connection
        $this->pdo = null;
    }

    public function GetUsuarios(){
        $sql = "SELECT * FROM usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DatosUsuario($idUser)
    {
        // datos del usuario
        $VIEW = 'view_profile_privado';
        $query = "SELECT * FROM $VIEW WHERE usid = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$idUser]);
        return $stmt->fetch();
    }
    
    public function GetDerechos($idMotivo)
    {
        $query = "SELECT * FROM derecho WHERE motivo = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$idMotivo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
