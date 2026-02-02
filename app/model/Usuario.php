<?php

namespace app\model;

use app\dao\UsuarioDao;

class Usuario{
  public $id, $nome, $email, $senha;

  public function save() :Usuario{
    return (new UsuarioDao()->saveDao($this));
  }
    public function selectAll() : array{
    return (new UsuarioDao()->selectAllDao($this));
  }
}