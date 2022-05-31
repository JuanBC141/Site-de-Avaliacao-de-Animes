<?php

session_start();
require_once "./repository/AnimesRepositoryPDO.php";
require_once "./model/Anime.php";

class AnimesController{
    public function index(){
        $animesRepository = new AnimesRepositoryPDO();
        return $animesRepository->listarTodos();
    }

    public function save($request){// Save recebe os dados para inserir no bd
                            //request = solicitação
        $animesRepository = new AnimesRepositoryPDO(); //Cria o repositorio

        //Recebe todos dados do form, e guarda no obj anime
        $anime = (object) $request;//tudo que tem no request passa a ter na var anime como objeto

        $upload =  $this->savePoster($_FILES);
        if(gettype($upload)=="string"){
            $anime->poster = $upload;
        }

    
        if ($animesRepository->salvar($anime))
            $_SESSION["msg"] = "Anime cadastrado com sucesso";
        else
            $_SESSION["msg"] = "Erro ao cadastrar anime";
        
        header("Location: /");
    }

    private function savePoster($file){
        $posterDir = "imagens/posters/";//Dir = Diretório
        $posterPath = $posterDir . basename($file["poster_file"]["name"]);//Path = Caminho
        //basename — Retorna apenas a parte que corresponde ao nome do arquivo de um caminho/path
        $posterTmp = $file["poster_file"]["tmp_name"];//tmp de temporario
        if (move_uploaded_file($posterTmp, $posterPath)){ //$postertmp vai ser movido para o $posterPath
            return $posterPath;
        }else{
         return false;   
        };
    }

    public function favorite($id){
        $animesRepository = new AnimesRepositoryPDO();
        $result = ['success' => $animesRepository->favoritar($id)];//atributo 'sucess' 
        header('Content-type: application/json');
        echo json_encode($result);
    }

    public function delete(int $id){
        $animesRepository = new AnimesRepositoryPDO();
        $result = ['success' => $animesRepository->delete($id)];//atributo 'sucess' 
        header('Content-type: application/json');
        echo json_encode($result);
    }
}