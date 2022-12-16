<?php
include_once("./config/config.php");
include_once("./controller/usuario.php");
include_once("./controller/endereco.php");
include_once("./controller/produto.php");
$method = $_SERVER["REQUEST_METHOD"];
$router = $_SERVER["REQUEST_URI"];
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Credentials: true");

usuarioController($method, $router);

enderecoController($method, $router);
produtoController($method, $router);
