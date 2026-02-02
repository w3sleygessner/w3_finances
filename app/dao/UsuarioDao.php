<?php

namespace app\dao;

use app\model\Usuario;

use PDO;

final class UsuarioDao extends DAO{
  public function __construct()
  {
    return parent::__construct();
  }

  public function saveDao(Usuario $model) :Usuario{
    if($model->id == null){
      return $this->insert($model);
    } else {
      return $this->update($model);
    }
  }

  public function insert(Usuario $model) : Usuario{
    $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?,?,?)";  
    $stmt = DAO::$conexao->prepare($sql);
    $stmt->bindValue(1, $model->nome);
    $stmt->bindValue(2, $model->email);
    $stmt->bindValue(3, $model->senha);
    $stmt->execute();

    $model->id = DAO::$conexao->lastInsertId();

    return $model;
  }

  public function update(Usuario $model):Usuario{
    $sql = "UPDATE usuario set nome = ?, email = ?, senha = ? WHERE id = ?";  
    $stmt = DAO::$conexao->prepare($sql);
    $stmt->bindValue(1, $model->nome);
    $stmt->bindValue(2, $model->email);
    $stmt->bindValue(3, $model->senha);
    $stmt->execute();

    $model->id = DAO::$conexao->lastInsertId();

    return $model;
  }

  public function selectAllDao() :array{
    $sql = "SELECT * FROM usuario";
    $stmt = DAO::$conexao->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_CLASS, \app\model\Usuario::class);
  }
}