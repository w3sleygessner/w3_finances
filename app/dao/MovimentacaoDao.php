<?php

namespace app\dao;

use app\model\Categoria;
use app\model\Movimentacao;
use app\model\Usuario;
use PDO;

final class MovimentacaoDao extends DAO{
  public function __construct()
  {
    return parent::__construct();
  }

  public function saveDao(Movimentacao $model):Movimentacao{
    return ($model->id == null) ? $this->insert($model) : $this->update($model);
  }

  public function insert(Movimentacao $model):Movimentacao{
    $sql = "INSERT INTO movimentacao (tipo, valor, data_lancamento, descricao, id_usuario, id_categoria) VALUES (?, ?, ?,?,?,?)";
    $stmt = DAO::$conexao->prepare($sql);
    $stmt->bindValue(1, $model->tipo);
    $stmt->bindValue(2, $model->valor);
    $stmt->bindValue(3, $model->data_lancamento);
    $stmt->bindValue(4, $model->descricao);
    $stmt->bindValue(5, $model->id_usuario);
    $stmt->bindValue(6, $model->id_categoria);
    $stmt->execute();

    $model->id = DAO::$conexao->lastInsertId();

    return $model;
  }

  public function update(Movimentacao $model):?Movimentacao{
    return $model;
  }

  public function selectAllDao() :array{
    $sql = "SELECT * FROM movimentacao";
    $stmt = DAO::$conexao->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_CLASS, \app\model\Movimentacao::class);
  }
}