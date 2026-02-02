<?php

namespace app\model;
use app\dao\CategoriaDao;

class Categoria{
  public $id, $tipo, $nome, $id_usuario;

  public function save() :Categoria{
    return (new CategoriaDao()->saveDao($this));
  }
    public function selectAll() : array{
    return (new CategoriaDao()->selectAllDao($this));
  }
  public function delete() :?bool{
    return (new CategoriaDao()->deleteDao($this));
  }
}
