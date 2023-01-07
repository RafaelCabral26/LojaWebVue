<?php
include_once("./config/config.php");
//include_once("./config/config_prod.php");
include_once("./service/jwt.php");
include_once("./controller/usuario.php");
include_once("./controller/endereco.php");
include_once("./controller/produto.php");

$method = $_SERVER["REQUEST_METHOD"];
$router = $_SERVER["REQUEST_URI"];

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Credentials: true");

$receiveToken = isset($_SERVER["HTTP_AUTHORIZATION"]) ? $_SERVER["HTTP_AUTHORIZATION"] : null;
$auth = validarJwt($receiveToken);
usuarioController($method, $router, $auth);
enderecoController($method, $router);

produtoController($method, $router);
//var_dump($_SERVER);

