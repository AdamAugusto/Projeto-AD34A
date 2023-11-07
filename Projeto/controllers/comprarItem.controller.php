<?php 
    if(empty($_SESSION['logado']) || $_SESSION['logado'] == false){
        header('Location: index.php?acao=login');
    }else{
        if($_SESSION['logado'] == true){
            require('models/produto.model.php');
            $id = $_GET['id'] ?? '';
            $teste = new Produto();
            $produtinho = $teste->selectUmProduto($id);
            $_SESSION['carrinho'][]= $produtinho['id'];
            header('Location: index.php?acao=home');
            #require('views/carrinho.view.php');
        }
    }   
    