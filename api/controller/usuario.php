<?php
include_once "./model/Endereco.php";
include "./model/Usuario.php";


function usuarioController($method, $router)

{

    if ($method == "POST") {
        if ($router == "/projetos/LojaWeb/api/index.php/add") {
            try {
                $convert = json_decode(file_get_contents("php://input"));
                $user = new Usuario();
                $user->nome = $convert->nome;
                $user->cpf = $convert->cpf;
                $user->email = $convert->email;
                $user->senha = $convert->senha;
                $user->data_nasc = $convert->data_nasc;
                $user->telefone = $convert->telefone;
                $user->add();
                echo "Usuario Cadastrado!";
            } catch (Exception $e) {
                echo "Erro:" . $e->getMessage();
            }
        }
    }
    if ($method == "GET") {
        if ($router == "/projetos/LojaWeb/api/index.php/list") {
            try {
                $user = new Usuario();
                $result = $user->getAll();
                echo json_encode($result);
            } catch (Exception $e) {
                echo "Erro:" . $e->getMessage();
            }
        }
    }
    if ($method == "GET") {
        if (!empty(strstr($router,"/projetos/LojaWeb/api/index.php/get"))) {
            try {
                $index = explode("/", $router);
                $id = $index[count($index) - 1];
                $user = new Usuario();
                $result = $user->get($id);
                echo json_encode($result);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode("Erro:" . $e->getMessage());
            }
        }
    }

    if ($method == "POST") {
        if ($router == "/projetos/LojaWeb/api/index.php/update") {
            try {
                $user = new Usuario();
                $convert = json_decode(file_get_contents("php://input"));
                $user->nome = $convert->nome;
                $user->cpf = $convert->cpf;
                $user->email = $convert->email;
                $user->senha = $convert->senha;
                $user->data_nasc = $convert->data_nasc;
                $user->telefone = $convert->telefone;
                
                $result = $user->update(1253);
                echo json_encode($result);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode("Erro:" . $e->getMessage());
            }
        }
    }

    if($method == "DELETE"){
        if(!empty(strstr($router, "/projetos/LojaWeb/api/index.php/delete"))) {
            try {
                $index = explode("/", $router);
                $id = $index[count($index) - 1];
                $user = new Usuario();
                $user->delete($id);
                echo "Usuário Deletado!";
            } catch (Exception $e) {
                throw new Exception("Erro ao deletar!" . $e->getMessage());
            }
        }
    }

    if($method == "DELETE"){
        if(!empty(strstr($router, "/projetos/LojaWeb/api/index.php/logicodelete" )) ) {
            try {

                $index = explode("/", $router);
                $id = $index[count($index) - 1];
                $user = new Usuario();
                $user->deleteLogico($id);
                
            } catch (Exception $e) {
                throw new Exception("Falha do delete lógico!" . $e->getMessage());
            }
        }
    }
    
}
