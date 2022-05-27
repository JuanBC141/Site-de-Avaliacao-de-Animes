<?php

$bd = new SQLite3("animes.db");

$sql = "DROP TABLE IF EXISTS animes";

if ($bd->exec($sql))
    echo "\ntabela filmes apagada\n";

$sql = "CREATE TABLE animes ( 
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo VARCHAR(200) NOT NULL,
    poster VARCHAR(200),
    sinopse TEXT,
    nota DECIMAL(3.1),
)";

if ($bd->exec($sql))
    echo "\ntabela de animes criada\n";
else
    echo "\n erro ao criar tabela de animes\n";

    $sql = "INSERT INTO animes (id, titulo, poster , sinopse, nota)
    VALUES(
        0,
        'Naruto Clássico',
        'https://www.themoviedb.org/t/p/w300/xFEveCF9EYNZH2dlasK5zGiahb3.jpg',
        'Naruto é um jovem órfão habitante da Vila da Folha que sonha se tornar o quinto Hokage,
        o maior guerreiro e governante da vila. Ao se graduar como ninja,
        descobre que tem um demônio raposa selado dentro de si.',
        9.9
    )";

    if ($bd->exec($sql))
    echo "\nanimes inseridos com sucesso\n";
else
    echo "\n erro ao inserir animes\n";


    
    $sql = "INSERT INTO animes (id, titulo, poster , sinopse, nota)
    VALUES(
        1,
        'Dragon Ball',
        'https://www.themoviedb.org/t/p/w300/f2zhRLqwRLrKhEMeIM7Z5buJFo3.jpg',
        'Criada por Akira Toryiama, a franquia conta a história de Son Goku, 
  guerreiro que descobre ser parte de um legado de poderosos conquistadores alienígenas - 
  e passa a defender seu planeta adotivo, a Terra, de outros seres igualmente superfortes e capazes de feitos descomunais.',
        9.7
    )";

    if ($bd->exec($sql))
    echo "\nanimes inseridos com sucesso\n";
else
    echo "\n erro ao inserir animes\n";
