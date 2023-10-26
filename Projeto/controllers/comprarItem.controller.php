<?php 
    if(empty($_SESSION['logado']) || $_SESSION['logado'] == false){
        header('Location: index.php?acao=login');
    }else{
        if($_SESSION['logado'] == true){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT * FROM produto WHERE id = :id');
            $id = $_GET['id'] ?? '';
            $query->bindParam(':id', $id);
            $query->execute();
            $produtinho = $query->fetch(PDO::FETCH_OBJ);
            $_SESSION['carrinho'][]= $produtinho->id;
            header('Location: index.php?acao=home');
        }
    }   
    