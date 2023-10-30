<?php 
        require('templates/headerLogado.php');
        if(isset($_SESSION['usuario'])){
                if($_SESSION['usuario'] == 'administrador'){
                        require('views/listaPedidosAdmin.view.php');
                }
                else{
                        require('views/listaPedidos.view.php');
                }
        }
        else{
                header('Location: index.php?acao=login');
        }
        
        