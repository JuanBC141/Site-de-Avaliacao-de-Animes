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
                <li class="tab"><a class="active red" href="#test1">Animes</a></li>
                <li class="tab"><a class="" href="/fav">Favoritos</a></li>
                <li class="tab"><a class="" href="/maisdzoito">Hentai ( ͡° ͜ʖ ͡°)</a></li>

            </ul>
        </div>
    </nav>
    <!-- Topo -->


    <!-- Corpo -->
    <div class="container">
        <div class="row">

            <?php if (!$animes) echo"<p class='card-panel red lighten-4'>Nenhum anime cadastrado</p>"?>

            <?php foreach($animes as $anime) :?>
            <div class="col s7 m4 l4 xl3">
                <div class="card hoverable card-serie">
                    <div class="card-image">
                        <img src="<?= $anime->poster ?>" class="activator" />
                        <button class="btn-fav btn-floating halfway-fab waves-effect waves-light red"
                            data-id="<?= $anime->id ?>">
                            <i class="material-icons"><?= ($anime->favorito) ? "favorite" : "favorite_border" ?></i>
                        </button>
                    </div>
                    <div class="card-content">
                        <p class="valign-wrapper">
                            <i class="material-icons amber-text">star</i> <?= $anime->nota ?>
                        </p>
                        <span class="card-title activator truncate">
                            <?= $anime->titulo ?>
                        </span>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?= $anime->titulo ?><i
                                class="material-icons right">close</i></span>
                        <p><?= substr($anime->sinopse, 0, 500) . "..." ?></p>
                        <button class="waves-effect waves-light btn-small right red accent-2 btn-delete"
                            data-id="<?= $anime->id ?>"><i class="material-icons">delete</i></button>

                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <!--Corpo -->
    </div>

    <?= Mensagem::mostrar(); ?>

    <script>
    document.querySelectorAll(".btn-fav").forEach(btn => {
        btn.addEventListener("click", e => {
            const id = btn.getAttribute("data-id") //pega o id do button
            fetch(`/favoritar/${id}`) // faço uma solicitação favoritar
                //fetch  da ao navegador uma interface para execução de requisições HTTP
                .then(response => response.json()) //quando eu tiver a resposta, convert pra json
                .then(response => { //quando eu tiver a conversão
                    if (response.success === "ok") { // verifica se atrib success é ok
                        if (btn.querySelector("i").innerHTML === "favorite") {
                            //innerHTML define ou obtém a sintaxe HTML ou XML descrevendo os elementos descendentes.
                            btn.querySelector("i").innerHTML =
                                "favorite_border" // se for ok faz troca
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

    document.querySelectorAll(".btn-delete").forEach(btn => {
      btn.addEventListener("click", e => {
        const id = btn.getAttribute("data-id")
        const requestConfig = { method: "DELETE", headers: new Headers()}
        fetch(`/animes/${id}`, requestConfig)
          .then(response => response.json())
          .then(response => {
            if (response.success === "ok") {
              const card = btn.closest(".col")// retorna o ancestral mais próximo, em relação ao elemento atual
              card.classList.add("fadeOut")//vai até as class existentes e add a fadeout
              setTimeout(() => card.remove(), 1000)//progamamos que o card se apague depois de um segundo
            }
          })
          .catch(error => {
            M.toast({
              html: 'Erro ao deletar'
            })
          })
      });
    });
    </script>

</body>

</html>