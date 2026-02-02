<?php

namespace app\controller;

use app\model\Categoria;
use PDOException;

final class CategoriaController{
  public static function cadastro() :void{
    echo "Categoria Cadastrada";
    $categoria = new Categoria();
    $categoria->nome = "Salário";
    $categoria->tipo = "E";
    $categoria->id_usuario = 1;

    $categoria->save();
  }

  public static function listar() :void{
    $categoria = new Categoria();
    $listaCategoria = $categoria->selectAll();
    var_dump($listaCategoria);
  }

  public static function deletar() :void{
    $categoria = new Categoria();
    $categoria->id = 1;
    $categoria->delete();
  }

}