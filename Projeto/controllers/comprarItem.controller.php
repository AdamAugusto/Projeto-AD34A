<?php 
    if(empty($_SESSION['logado']) || $_SESSION['logado'] == false){
        header('Location: index.php?acao=login');
    }else{
        if($_SESSION['logado'] == true){
            require('templates/headerLogado.php');
            require('views/comprar.view.php');
        }
    }   
    