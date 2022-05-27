<?php 

$bd = new SQLite3("./db/animes.db");

$sql = "ALTER TABLE animes ADD COLUMN favorito INT DEFAULT 0";

if ($bd->exec($sql))
    echo "\ntabela animes alterada com sucesso\n";
else
    echo "\nerro ao alterar tabela animes\n";