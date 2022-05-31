<?php

$rota =  $_SERVER["REQUEST_URI"];
$metodo = $_SERVER["REQUEST_METHOD"];

require_once "./controller/AnimesController.php";

if($rota === "/"){
  require_once "view/galeria.php";
  exit();
}

if($rota === "/novo"){
  if($metodo == "GET") require_once "view/cadastrar.php";
  if($metodo == "POST") {
    $controller = new AnimesController();
    $controller->save($_REQUEST);
  };
  exit();
}
  
//Vamos pegar um pedaço da string pra ver se realmente é deletar//Substr pega uma parte da string
if(substr($rota,0,strlen("/favoritar")) === "/favoritar"){//substr Retorna uma parte de uma string
  $controller = new AnimesController();
  $controller->favorite(basename($rota));
  exit();
}

   //Vamos verificar se a qntd de caracteres é igual a animes//Substr pega uma parte da string
if (substr($rota, 0, strlen("/animes")) === "/animes") {
    if($metodo == "GET") require "view/galeria.php";
    if($metodo == "DELETE"){
        $controller = new AnimesController();
        $controller->delete(basename($rota));
    } 
    exit();
}

if($rota === "/maisdzoito"){
  require_once "view/dezoitomais.php";
  exit();
}

if($rota === "/vixe"){
  require_once "view/safado.php";
  exit();
}

if($rota === "/fav"){
  require_once "view/favoritos.php";
  exit();
}
require_once "view/404.php";

