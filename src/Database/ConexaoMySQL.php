<?php 

namespace Emanuelaguiar\LoginPhp\Database;
require "vendor/autoload.php";

use Dotenv\Dotenv;
use PDO;
use PDOException;



class ConexaoMySQL {
    
    private static $instancia;
    private $pdo;

    private function __construct() {
        try {

            $dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
            $dotenv->safeLoad();
   

            $this->pdo = new PDO(
                "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset={$_ENV['DB_CHARSET']}",
                $_ENV['DB_USER'],
                $_ENV['DB_PASSWORD']
            );
            
            // Configuração para lançar exceções em caso de erros
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Configuração para retornar objetos em vez de arrays associativos
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instancia) {
            self::$instancia = new ConexaoMySQL();
        }
        return self::$instancia->getPDO();
    }

    public function getPDO() {
        return $this->pdo;
    }
}
?>