<?php

namespace app\controller;

use app\model\Movimentacao;
use PDOException;

final class MovimentacaoController{
  public static function cadastro() :void{
    echo "movimentacao Cadastrada";

    $dataBr = "29/01/2026";

    $movimentacao = new Movimentacao();
    $movimentacao->valor = 1500;
    // explode - transforma uma string em array sempre que encontrar o separador "/"
    // array_reverse - altera a ordem do array
    // implode - transforma em string colocando o separador "-"
    $movimentacao->data_lancamento = implode('-', array_reverse(explode('/', $dataBr)));;
    $movimentacao->descricao = "Salário";
    $movimentacao->tipo = "E";
    $movimentacao->id_usuario = 1;
    $movimentacao->id_categoria = 1;

    $movimentacao->save();
  }

  public static function listar() :void{
    $movimentacao = new Movimentacao();
    $lista = $movimentacao->selectAll();
    var_dump($lista);
  }
}