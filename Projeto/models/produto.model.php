<?php 
    class Produto {
        public function __construct(){

        }

        public function armazenaProduto($nome, $preco, $quantidade, $detalhe, $categoria){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare("INSERT INTO produto (nome, preco, quantidade, descricao, categoria) VALUES(:nome, :preco, :quantidade, :descricao, :categoria)");
            $query->bindParam(':nome', $nome);
            $query->bindParam(':preco', $preco);
            $query->bindParam(':quantidade', $quantidade);
            $query->bindParam(':descricao', $detalhe);
            $query->bindParam(':categoria', $categoria);
            $query->execute();
            return;
        }

        public function selectbyId($id){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT * FROM produto WHERE id = :id');
                $query->bindParam(':id', $id);
                $query->execute();
                return $query->fetch(PDO::FETCH_OBJ);
        }

        public function selectProduto(){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT * FROM produto');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function selectUmProduto($id){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT * FROM produto WHERE id = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }

        public function editarQuantidade($id, $quantidade){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare('UPDATE produto SET quantidade= :quantidade WHERE id = :id');
            $query->bindParam(':id', $id);
            $query->bindParam(':quantidade', $quantidade);
            $query->execute();
        }

        public function excluirProduto($id){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare("DELETE FROM produto WHERE id = :id");
            $id = $_GET['id'] ?? '';
            $query->bindParam(':id', $id);
            $query->execute();
        }
    }