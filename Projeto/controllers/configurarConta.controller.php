<?php
    if(empty($_SESSION['idUsuario'])){
        $o_endereco=[];
        require('templates/headerLogado.php');
        require('views/configurarConta.view.php');
    }else{
        require_once('repositorios/produtos.conexao.php');
        $bd = Conexao::get();
        $query = $bd->prepare('SELECT * FROM endereco WHERE usuario_id = :idUsuario');
        $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
        $query->execute();
        $o_endereco=$query->fetchAll(PDO::FETCH_OBJ);
        require('templates/headerLogado.php');
        require('views/configurarConta.view.php');
    }
    