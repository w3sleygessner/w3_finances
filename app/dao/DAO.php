<?php

namespace app\dao;

use PDO;

abstract class DAO extends PDO
{
  protected static $conexao = null;

  public function __construct()
  {
    $dsn = "mysql:dbname=w3finances;host=localhost:3306;charset=utf8mb4";
    $user = $_ENV["db"]["user"];
    $password = $_ENV["db"]["password"];

    if (self::$conexao == null) {
      try {
        self::$conexao = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        echo "Conectado com sucesso!"; // Se aparecer, funcionou
      } catch (\PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage(); // Mostra o erro
      }
    }
  }
}
