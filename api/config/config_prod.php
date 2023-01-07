<?php
include("secret.php"); 
// Configuração do PHP
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
ini_set("enable_post_data_reading", 1);

define("DRIVE", "mysql"); // Qual tipo de banco de dados
define("HOST", "http://lojawebvue.liveblog365.com"); // url ou ip do local do banco de dados
define("PORT", ""); // Porta de acesso ao banco de dados
define("USER", "lblog_33225429"); // Usuario do banco de dados
define("DB", "lblog_33225429_lojaweb"); // Nome do banco de dados

define("MIDIAS_USER", "/../midias/user"); // Local da pasta onde será gravado os dados
define("MIDIAS_PRODUTOS", "/../midias/produtos"); // Local da pasta onde será gravado os dados
define("KEY", "ff08e69475562803be134abe13fbd09f27356cfd14944353e789a9afa4661a70");

// Senha do banco de dados
define("PASS", "");
?>