<?php

require_once "Conexao.php";

class AnimesRepositoryPDO{

    private $conexao;
    public function __construct()
    {
        $this->conexao = Conexao::criar();
    }

    public function listarTodos():array{
        $bd = Conexao::criar();
        $animesLista = array();

        $sql = "SELECT * FROM animes"; //seleciona os animes do bd
        $animes = $this->conexao->query($sql);//busca os animes no bd //Query faz uma consulta/solicitação
        if (!$animes) return false;//Se não houver animes ele retorna false
        
        while($anime = $animes->fetchObject()){// fetchobject determinar qual objeto será usado para representar os dados vindos de uma consulta
            array_push($animesLista, $anime);//array push empurra um novo valor para dentro de um array
        }
        return $animesLista;
    }

    public function salvar($anime):bool{

        $sql = "INSERT INTO animes (titulo, poster , sinopse, nota)
        VALUES(:titulo, :poster, :sinopse, :nota)";//Os valores do bd para o bindvalue receber
        $stmt = $this->conexao->prepare($sql);//Statement é um instrução, ira ser uma expressao uma ação a ser executada       
        $stmt->bindValue(':titulo', $anime->titulo, PDO::PARAM_STR);//BindValue Associa um valor a um parametro
        $stmt->bindValue(':poster', $anime->poster, PDO::PARAM_STR);
        $stmt->bindValue(':sinopse', $anime->sinopse, PDO::PARAM_STR);
        $stmt->bindValue(':nota', $anime->nota, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function favoritar(int $id){
        $sql = "UPDATE animes SET favorito = NOT favorito WHERE id=:id";//not diz que não pode ser igual ao outro
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            return "erro";
        }
    }

    public function delete(int $id){
        $sql = "DELETE FROM animes WHERE id=:id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            return "erro";
        }
    }
}