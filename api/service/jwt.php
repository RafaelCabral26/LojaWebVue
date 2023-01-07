<?php

function gerarJwt($dados) 
{
    $key = KEY;


    $header = [
        'typ' => 'JWT',
        'alg' => 'HS256'
    ];


    $payload = [
        '$exp' =>(new DateTime("now"))->getTimestamp(),
        '$uid' => $dados->id_usuario,
        'email' => $dados->email,
        'name' => $dados->nome,
        'ultimo_login' => (new DateTime("now"))->getTimestamp()
    ];


    //Transformar em JSON

    $header = json_encode($header);
    $payload = json_encode($payload);

    //Base 64

    $header = base64_encode($header);
    $payload = base64_encode($header);

    $sign = hash_hmac('sha256', $header . "." . $payload, $key, true);
    $sign = base64_encode($sign);

    $token =  $header . "." . $payload . "." . $sign;

    return $token;
}

function validarJwt($token) 
{
if ($token == null) return false;
    $key = KEY;
    $token = str_replace(["Bearer", " "], "", $token);

    $partes = explode(".", $token);
    
    $header =  $partes[0];
    $payload = $partes[1] ;
    $sign =  $partes[2];

    $signVerify = base64_encode(hash_hmac('sha256', $header . "." . $payload, $key, true));

    if($sign === $signVerify)
    {
        $payload = json_encode(base64_decode($payload));
        return $payload;
    }
    return false;
}