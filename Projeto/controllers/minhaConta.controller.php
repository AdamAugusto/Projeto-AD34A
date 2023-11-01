<?php
    if(empty($_SESSION['idUsuario'])){
        $o_cartao=[];
        session_destroy();
        require('loginPage.controller.php');
    }else{
        require_once('repositorios/produtos.conexao.php');
        $bd = Conexao::get();
        $query = $bd->prepare('SELECT * FROM cartao WHERE usuario_id = :idUsuario');
        $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
        $query->execute();
        $o_cartao=$query->fetchAll(PDO::FETCH_OBJ);
        $query = $bd->prepare('SELECT MAX(id) FROM pedido WHERE usuario_id = :idUsuario');
        $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
        $query->execute();
        $o_pedido_id=$query->fetch(PDO::FETCH_ASSOC);
        $query = $bd->prepare('SELECT * FROM pedido WHERE id = :id');
        $query->bindParam(':id', $o_pedido_id['MAX(id)']);
        $query->execute();
        $o_pedido=$query->fetchAll(PDO::FETCH_OBJ);
        if(sizeof($o_pedido)== 0){

        }else{
            foreach($o_pedido as $pedido){
                $query = $bd->prepare('SELECT * FROM endereco WHERE id = :id');
                $query->bindParam(':id', $pedido->endereco_id);
                $query->execute();
                $o_endereco=$query->fetch(PDO::FETCH_OBJ);
            }  

        }
        require('templates/headerLogadoUsuario.php');
        require('views/minhaConta.view.php');
    }
    