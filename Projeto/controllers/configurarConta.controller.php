<?php
    if(empty($_SESSION['idUsuario'])){
        $o_endereco=[];
        require('templates/headerLogado.php');
        require('views/configurarConta.view.php');
    }else{
        require('models/endereco.model.php');
        $teste = new Endereco();
        $o_endereco=$teste->selectVariosbyUsuarioId();
        require('templates/headerLogadoUsuario.php');
        require('views/configurarConta.view.php');
    }
    