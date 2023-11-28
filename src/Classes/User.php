<?php 

namespace Emanuelaguiar\LoginPhp\Classes;

use Emanuelaguiar\LoginPhp\Database\ConexaoMySQL;

class User{

    public static function getAll(){

        $pdo = ConexaoMySQL::getInstance();

        $sql = "SELECT * FROM users";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    
    }

}