<?php
    require_once('repositorios/produtos.conexao.php');
    $bd = Conexao::get();
    $query = $bd->prepare('SELECT * FROM produto');
    $query->execute();
    $produtos = $query->fetchAll(PDO::FETCH_OBJ);
    if(empty($_SESSION['logado']) || $_SESSION['logado'] == false){
        require('templates/header.php');
        require('views/homeUsuario.view.php');
        //echo ($_SESSION['logado']);
    }else{
        if($_SESSION['logado'] == true){
            require('templates/headerLogado.php');
            require('views/homeAdmin.view.php');
        }else{
            require('templates/header.php');
            require('views/homeUsuario.view.php');
        } 
    }   
    


