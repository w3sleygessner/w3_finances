<?php

use app\controller\UsuarioController;
use app\controller\CategoriaController;
use app\controller\MovimentacaoController;

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

switch($url){
  case "/":
    echo "HOMEPAGE";
    break;
// usuario
  case "/usuario":
    UsuarioController::listar();
    break;
  case "/usuario/cadastro":
    UsuarioController::cadastro();
    break;
// Categoria
  case "/categoria":
    CategoriaController::listar();
    break;
  case "/categoria/cadastro":
    CategoriaController::cadastro();
    break;
  case "/categoria/deletar":
    CategoriaController::deletar();
    break;
// movimentacao
  case "/movimentacao/cadastro":
    MovimentacaoController::cadastro();
    break;
  case "/movimentacao":
    MovimentacaoController::listar();
    break;  
}