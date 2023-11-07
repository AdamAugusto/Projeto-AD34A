<?php
     require('models/produto.model.php');
    $teste = new Produto();
    $produtos = $teste->selectProduto();
    if(empty($_SESSION['logado']) || $_SESSION['logado'] == false){
        require('templates/header.php');
        require('views/homeUsuario.view.php');
        //echo ($_SESSION['logado']);
    }else{
        if($_SESSION['logado'] == true && $_SESSION['usuario'] == 'administrador'){
            require('templates/headerLogado.php');
            require('views/homeAdmin.view.php');
        }else{
            if($_SESSION['logado'] == true){
                require('templates/headerLogadoUsuario.php');
                require('views/homeUsuario.view.php');
            }
            else{
                require('templates/header.php');
                require('views/homeUsuario.view.php');
            }
        } 
    }   
    


