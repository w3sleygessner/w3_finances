<?php

namespace app\dao;

use app\model\Categoria;
use app\model\Usuario;
use PDO;

final class CategoriaDao extends DAO{
  public function __construct()
  {
    return parent::__construct();
  }

  public function saveDao(Categoria $model):Categoria{
    return ($model->id == null) ? $this->insert($model) : $this->update($model);
  }

  public function insert(Categoria $model):Categoria{
    $sql = "INSERT INTO categoria (nome, tipo) VALUES (?, ?)";
    $stmt = DAO::$conexao->prepare($sql);
    $stmt->bindValue(1, $model->nome);
    $stmt->bindValue(2, $model->tipo);
    $stmt->execute();

    $model->id = DAO::$conexao->lastInsertId();

    return $model;
  }

  public function update(Categoria $model):?Categoria{
    return $model;
  }

  public function selectAllDao() :array{
    $sql = "SELECT * FROM categoria";
    $stmt = DAO::$conexao->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_CLASS, \app\model\Categoria::class);
  }

  public function deleteDao(Categoria $model) :?bool {
    $sql = "DELETE FROM categoria WHERE id = ?";
    $stmt = DAO::$conexao->prepare($sql);
    $stmt->bindValue(1, $model->id);

    echo "DELETADO";
    return $stmt->execute();
  }
}