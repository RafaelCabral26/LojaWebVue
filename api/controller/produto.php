<?php
include_once "./model/Produto.php";

function produtoController($method, $router) 
{
if($method == "POST"){
    if($router == "/projetos/LojaWeb/api/index.php/produtos/add") {
        try {

        $convert = json_decode(file_get_contents("php://input"));
        $prod = new Produto();
        $prod->nome = $convert->nome;
        $prod->descricao= $convert->descricao;
        $prod->quant = $convert->quant;
        $prod->data_alteracao = $convert->data_alteracao;
        $prod->valor = $convert->valor;
        $prod->largura = $convert->largura;
        $prod->altura = $convert->altura;
        $prod->comprimento = $convert->comprimento;
        $prod->peso = $convert->peso;
        $prod->fotos = $convert->fotos;
        $prod->add();
        echo "Produto Cadastrado!";
        }catch (Exception $e) {
            throw new Exception("Erro no cadastro do  produto!", $e->getMessage());
        }
    }
}
if($method == "GET") {
    if(!empty(strstr($router ,"/projetos/LojaWeb/api/index.php/produtos/get"))) {
        try {

            $index = explode("/" ,$router);
            $nome = $index[count($index) - 1];
            $prod = new Produto();
            $resultado = $prod->get($nome);
            echo "Descrição do produto é : " . json_encode($resultado);
        }catch (Exception $e) {
            throw new Exception("Erro ao buscar produto!" . $e->getMessage());
        }

    }
}
if($method == "POST") {
    if(!empty(strstr($router,"/projetos/LojaWeb/api/index.php/produtos/update" ))) {
        try {

        $index = explode("/", $router);
        $nome = $index[count($index) - 1];
        $produto = new Produto();
        $convert = json_decode(file_get_contents("php://input"));
        $produto->nome = $convert->nome;
        $produto->descricao = $convert->descricao;
        $produto->quant = $convert->quant;
        $produto->data_alteracao = $convert->data_alteracao;
        $produto->valor = $convert->valor;
        $produto->largura = $convert->largura;
        $produto->altura = $convert->altura;
        $produto->comprimento = $convert->comprimento;
        $produto->peso = $convert->peso;
        $produto->fotos = $convert->fotos;
        $produto->update($nome);
        echo "Produto Atualizado!";
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar produto" . $e->getMessage());
        }

    }
}

if($method == "POST") {
    if(!empty(strstr($router, "/projetos/LojaWeb/api/index.php/produtos/delete"))) {
        try{
            $index = explode("/", $router);
            $nome = $index[count($index) - 1];
            $prod = new Produto();
            $prod->deleteLogico($nome);
            echo "Delete logico concluido.";
        }catch(Exception $e) {
            throw new Exception("Erro no delete" . $e->getMessage());
        }
    }
}


}
