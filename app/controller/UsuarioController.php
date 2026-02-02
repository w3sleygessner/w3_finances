<?php

namespace app\controller;

use app\model\Usuario;
use PDOException;

final class UsuarioController{
  public static function cadastro() :void{
    echo "usuario cadastrado";
    $usuario = new Usuario();
    $usuario->nome = "TESTE";
    $usuario->email = "w3sleygessner@gmail.com";
    $usuario->senha = "123145";

    try{
      $usuario->save();
    } catch(PDOException $e){
      if($e->getCode() == "23000"){
        echo "Ops! Esse e-mail já está cadastrado.";
      } else {
        echo "erro interno no banco de dados";
      }
    }
  }

    public static function listar() :void{
    $usuario = new Usuario();
    $listaUsuario = $usuario->selectAll();
    var_dump($listaUsuario);
  }
}