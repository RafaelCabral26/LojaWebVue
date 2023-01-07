<?php
include_once "./model/Endereco.php";
include "./model/Usuario.php";

function usuarioController($method, $router, $auth)

{

    if ($method == "POST") {
        if ($router == "/projetos/lojaweb/api/index.php/add") {
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
    };
    if ($method == "GET") {
        if (!empty(strstr($router, "/usuario/list")) && $auth) {
            try {
                $user = new Usuario();
                $result = $user->getAll();
                echo json_encode($result);
            } catch (Exception $e) {
                echo "Erro:" . $e->getMessage();
            }
        };



        if (!empty(strstr($router,"/projetos/lojaweb/api/index.php/get"))) {
            try {
                $index = explode("/", $router);
                $id = $index[count($index) - 1];
                $user = new Usuario();
                $result = $user->get($id);
                http_response_code(200);
                echo json_encode($result);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode("Erro:" . $e->getMessage());
            }
        };



    };
 

    if ($method == "POST") {
        if ($router == "/projetos/lojaweb/api/index.php/update") {
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
        };



        if(!empty(strstr($router, "/usuario/login")) && $auth) {
            try {
 
                $dados = json_decode(file_get_contents('php://input'));
                $usuario = new Usuario();
                $result = $usuario->login($dados->email, $dados->senha);
                if($result != null) {
                    http_response_code(200);
                    $usuario = $result[0];
                    $_SERVER["HTTP_AUTHORIZATION"] = gerarJwt($usuario);
                    echo json_encode(array("user" => $usuario,"token" => gerarJwt($usuario)));
                    
                }else {
                 http_response_code(401);
                 echo json_encode("Usuario nao encontrado");
                }
             }catch(Exception $e) {
                 http_response_code(500);
                 throw new Exception("Erro ao fazer login!" . $e->getMessage());
             }
         };
    }

    if($method == "DELETE"){
        if(!empty(strstr($router, "/projetos/lojaweb/api/index.php/delete"))) {
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
        if(!empty(strstr($router, "/projetos/lojaweb/api/index.php/logicodelete" )) ) {
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
