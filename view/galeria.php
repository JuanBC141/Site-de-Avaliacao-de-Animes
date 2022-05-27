<?php include "cabecalho.php" ?>

<?php

require_once "./util/Mensagem.php";

$controller = new AnimesController();
$animes = $controller->index();
?>

<body>
    <!-- Topo -->
    <nav class="nav-extended grey darken-4">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li class="active"><a href="/">Galeria</a></li>
                <li><a href="/novo">Cadastrar</a></li>
            </ul>
        </div>
        <div class="nav-header center">
            <img class="logo" src="imagens/Logopng2copia2.png" alt="Logo Animes AJ">
        </div>
        <div class="nav-contente">
            <ul class="tabs tabs-transparent black">
                <li class="tab"><a class="active" href="#test1">Todos</a></li>
                <li class="tab"><a class="" href="#test2">Assistidos</a></li>
                <li class="tab"><a class="" href="#test3">Favoritos</a></li>

            </ul>
        </div>
    </nav>
    <!-- Topo -->


    <!-- Corpo -->
    <div class="container">
        <div class="row">
            <?php foreach($animes as $anime) :?>
            <div class="col s12 m6 l3">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="<?= $anime->poster ?>">
                        <button class="btn-fav btn-floating halfway-fab waves-effect waves-light red"
                            data-id="<?= $anime->id ?>">
                            <i class="material-icons"><?= ($anime->favorito)?"favorite":"favorite_border" ?></i>
                        </button>
                    </div>
                    <div class="card-content">
                        <p class="valign-wrapper">
                            <i class="material-icons amber-text">star</i> <?= $anime->nota ?>
                        </p>
                        <span class="card-title"><?= $anime->titulo ?></span>
                        <p><?= $anime->sinopse ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <!-- Corpo -->
    </div>

    <?= Mensagem::mostrar(); ?>

    <script>
document.querySelectorAll(".btn-fav").forEach(btn => {
      btn.addEventListener("click", e => {
        const id = btn.getAttribute("data-id")//pega o id do button
        fetch(`/favoritar/${id}`)// faço uma solicitação favoritar
        //fetch  da ao navegador uma interface para execução de requisições HTTP
          .then(response => response.json())//quando eu tiver a resposta, convert pra json
          .then(response => {//quando eu tiver a conversão
            if (response.success === "ok") {// verifica se atrib success é ok
              if (btn.querySelector("i").innerHTML === "favorite") {
                btn.querySelector("i").innerHTML = "favorite_border"// se for ok faz troca
              } else {                                              
                btn.querySelector("i").innerHTML = "favorite"
              }
            }
          })
          .catch(error => {
            M.toast({
              html: 'Erro ao favoritar'
            })
          })
      });
    });
    </script>

</body>

</html>