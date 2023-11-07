<?php 
    class Endereco{
        public function __construct(){
        
        }

        public function armazenaEndereco($estado, $cidade, $bairro, $rua, $numero){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare("INSERT INTO endereco (estado, cidade, bairro, rua, numero, usuario_id) 
            VALUES(:estado, :cidade, :bairro, :rua, :numero, :usuario_id)");
            $query->bindParam(':estado', $estado);
            $query->bindParam(':cidade', $cidade);
            $query->bindParam(':bairro', $bairro);
            $query->bindParam(':rua', $rua);
            $query->bindParam(':numero', $numero);
            $query->bindParam(':usuario_id', $_SESSION['idUsuario']);
            $query->execute();
            return;
        }

        public function armazenaEnderecoComplemento($estado, $cidade, $bairro, $rua, $numero, $complemento){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare("INSERT INTO endereco (estado, cidade, bairro, rua, numero, complemento, usuario_id) 
            VALUES(:estado, :cidade, :bairro, :rua, :numero, :complemento, :usuario_id)");
            $query->bindParam(':estado', $estado);
            $query->bindParam(':cidade', $cidade);
            $query->bindParam(':bairro', $bairro);
            $query->bindParam(':rua', $rua);
            $query->bindParam(':numero', $numero);
            $query->bindParam(':complemento', $complemento);
            $query->bindParam(':usuario_id', $_SESSION['idUsuario']);
            $query->execute();
            return;
        }

        public function editaEndereco($estado, $cidade, $bairro, $rua, $numero){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare("UPDATE endereco SET estado= :estado, cidade= :cidade, bairro= :bairro, rua= :rua, numero= :numero WHERE usuario_id = :id");
            $query->bindParam(':id', $_SESSION['idUsuario']);
            $query->bindParam(':estado', $estado);
            $query->bindParam(':cidade', $cidade);
            $query->bindParam(':bairro', $bairro);
            $query->bindParam(':rua', $rua);
            $query->bindParam(':numero', $numero);
            $query->execute();
            return;
        }

        public function editaEnderecoComplemento($estado, $cidade, $bairro, $rua, $numero, $complemento){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare("UPDATE endereco SET estado= :estado, cidade= :cidade, bairro= :bairro, rua= :rua, numero= :numero, complemento= :complemento WHERE usuario_id = :id");
            $query->bindParam(':id', $_SESSION['idUsuario']);
            $query->bindParam(':estado', $estado);
            $query->bindParam(':cidade', $cidade);
            $query->bindParam(':bairro', $bairro);
            $query->bindParam(':rua', $rua);
            $query->bindParam(':numero', $numero);
            $query->bindParam(':complemento', $complemento);
            $query->execute();
            return;
        }

        public function selectbyUsuarioId(){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT * FROM endereco WHERE usuario_id = :idUsuario');
            $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function selectVariosbyUsuarioId(){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT * FROM endereco WHERE usuario_id = :idUsuario');
            $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function selectbyId($id){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT * FROM endereco WHERE id = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function excluirEndereco(){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare("DELETE FROM endereco WHERE usuario_id = :id");
            $query->bindParam(':id', $_SESSION['idUsuario']);
            $query->execute();
        }
    }

    