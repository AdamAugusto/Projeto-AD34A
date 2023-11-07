<?php 
    class Cartao{
        public function __construct(){
        }

        public function armazenarCartao($numero, $titular, $validade, $codigo){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare("INSERT INTO cartao (numero, titular, validade, codigo, usuario_id) VALUES(:numero, :titular, :validade, :codigo, :usuario_id)");
            $query->bindParam(':numero', $numero);
            $query->bindParam(':titular', $titular);
            $query->bindParam(':validade', $validade);
            $query->bindParam(':codigo', $codigo);
            $query->bindParam(':usuario_id', $_SESSION['idUsuario']);
            $query->execute();
        }

        public function selectbyUsuarioId(){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT * FROM cartao WHERE usuario_id = :idUsuario');
            $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function selectVariosbyUsuarioId(){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT * FROM cartao WHERE usuario_id = :idUsuario');
            $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
    }