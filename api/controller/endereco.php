<?php
include_once "./model/Endereco.php";


function enderecoController($method, $router)
{
    if ($method == "POST") {
        if ($router == "/projetos/lojaweb/api/index.php/endereco/add") {
            try {
                $convert = json_decode(file_get_contents("php://input"));
                $ender = new Endereco();
                $ender->cep = $convert->cep;
                $ender->logradouro = $convert->logradouro;
                $ender->bairro = $convert->bairro;
                $ender->cidade = $convert->cidade;
                $ender->uf = $convert->uf;
                $ender->add();
                echo "Endereço Cadastrado!";
            } catch (Exception $e) {
                echo "Erro:" . $e->getMessage();
            }
        }
    }
    if($method == "GET") {
        if(!empty(strstr($router, "/projetos/lojaweb/api/index.php/endereco/get" ))) {
        try {

            $index = explode("/", $router);
            $cep = $index[count($index) - 1];
            $endereco = new Endereco();
            $result = $endereco->get($cep);
            echo "Endereço do CEP é: " . json_encode($result);
        } catch (Exception $e) {
            throw new Exception("Erro ao pegar cep" . $e->getMessage());
        }
        }
    }   
    if($method == "POST") {
        if(!empty(strstr($router, "/projetos/lojaweb/api/index.php/endereco/update" ))) {
            try{

                $index = explode("/", $router);
                $idcep = $index[count($index) - 1];
                $endereco = new Endereco();
                $convert = json_decode(file_get_contents("php://input"));
                $endereco->cep = $convert->cep;
                $endereco->logradouro = $convert->logradouro;
                $endereco->bairro = $convert->bairro;
                $endereco->cidade = $convert->cidade;
                $endereco->uf = $convert->uf;
                $endereco->update($idcep);
                echo "Endereço Atualizado";
            } catch (Exception $e) {
                throw new Exception("Erro ao atualizar endereço!" . $e->getMessage());
            }
    }

}


        if($method == "POST") {
            if(!empty(strstr($router, "/projetos/lojaweb/api/index.php/endereco/delete"))) {
                
                try{
                    $index = explode("/", $router);
                    $idcep = $index[count($index) - 1];
                    var_dump($idcep);
                    $endereco = new Endereco();
                    $endereco->delete($idcep);
                    echo "CEP deletado!";
                } catch (Exception $e) {
                    throw new Exception("Erro ao deletar CEP" . $e->getMessage());
                }
            }
        }
        if($method == "GET") {
            if(!empty(strstr($router, "/endereco/list"))) {
            try {
                $endereco = new Endereco();
                $result = $endereco->getAll();
                echo json_encode($result);
                return json_encode($result);
            } catch (Exception $e) {
                throw new Exception("Erro ao pegar endereços" . $e->getMessage());
            }
            }
        } 
}




?>