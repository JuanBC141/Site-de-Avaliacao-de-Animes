<?php include "cabecalho.php" ?>

<body>

    <!-- Topo -->
    <nav class="nav-extended grey darken-4">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li><a href="/">Galeria</a></li>
                <li class="active"><a href="/novo">Cadastrar</a></li>
            </ul>
        </div>
        <div class="nav-header center">
            <img class="logo" src="imagens/Logopng2copia2.png" alt="Logo Animes AJ">
        </div>
    </nav>
    <!-- Topo -->

    <!-- Corpo -->
    <div class="row">
        <form method="POST" enctype="multipart/form-data">
            <div class="col s6 offset-s3">
                <div class="card ">
                    <div class="card-content">
                        <span class="card-title">Cadastrar Anime</span>

                        <!-- Título -->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="titulo" type="text" class="validate" name="titulo" required>
                                <label for="titulo">Título do anime</label>
                            </div>
                        </div>
                        <!-- Título -->

                        <!-- Sinopse -->
                        <div class="row">
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="sinopse" id="sinopse" class="materialize-textarea" name="titulo"
                                        required></textarea>
                                    <label for="sinopse">Sinopse</label>
                                </div>
                            </div>
                        </div>
                        <!-- Sinopse -->

                        <!-- Nota -->
                        <div class="row">
                            <div class="input-field col s4">
                                <input name="nota" id="nota" type="number" step=".1" min="0" max="10" class="validate"
                                    required>
                                <label for="nota">Nota</label>
                            </div>
                        </div>
                        <!-- Nota -->

                        <!-- Capa -->
                        <div class="file-field input-field">
                            <div class="btn red">
                                <span>Capa</span>
                                <input type="file" name="poster_file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" name="poster" required>
                            </div>
                        </div>
                        <!-- Capa -->

                        <!-- Botões -->
                        <div class="card-action">
                            <a class="waves-effect waves-light btn red" href="/">Cancelar</a>
                            <button type="submit" href="#" class="waves-effect waves-light btn black">Salvar</button>
                        </div>
                        <!-- Botões -->
                    </div>
                </div>
            </div>
        </form>
    </div>

    </div>

    <!-- Corpo -->