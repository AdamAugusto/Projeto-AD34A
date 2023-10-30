<?php
    if(empty($_SESSION['idUsuario'])){
        $o_cartao=[];
        require('templates/headerLogado.php');
        require('views/minhaConta.view.php');
    }else{
        require_once('repositorios/produtos.conexao.php');
        $bd = Conexao::get();
        $query = $bd->prepare('SELECT * FROM cartao WHERE usuario_id = :idUsuario');
        $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
        $query->execute();
        $o_cartao=$query->fetchAll(PDO::FETCH_OBJ);
        require('templates/headerLogado.php');
        require('views/minhaConta.view.php');
    }
    