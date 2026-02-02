<?php

namespace app\model;
use app\dao\MovimentacaoDao;

class Movimentacao{
  public $id, $tipo, $valor, $data_lancamento, $descricao, $id_usuario, $id_categoria;

  public function save() :Movimentacao{
    return (new MovimentacaoDao()->saveDao($this));
  }

  public function selectAll() : array{
    return (new MovimentacaoDao()->selectAllDao($this));
  }
}
