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

if(substr($rota,0,strlen("/favoritar")) === "/favoritar"){
  $controller = new AnimesController();
  $controller->favorite(basename($rota));
  exit();
}

require_once "view/404.php";
