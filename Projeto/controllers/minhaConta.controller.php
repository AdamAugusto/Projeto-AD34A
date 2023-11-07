<?php
    if(empty($_SESSION['idUsuario'])){
        $o_cartao=[];
        session_destroy();
        require('loginPage.controller.php');
    }else{
        require('models/endereco.model.php');
        require('models/cartao.model.php');
        require('models/pedido.model.php');
        $testeCartao = new Cartao();
        $o_cartao=$testeCartao->selectVariosbyUsuarioId();
        $testePedido = new Pedido();
        $o_pedido_id= $testePedido->selectUltimoPedido();
        $o_pedido=$testePedido->selectPedidobyId($o_pedido_id['MAX(id)']);
        if(!(isset($o_pedido->id))){

        }else{
                $testeEndereco = new Endereco();
                $o_endereco=$testeEndereco->selectbyId($o_pedido->endereco_id);

        }
        require('templates/headerLogadoUsuario.php');
        require('views/minhaConta.view.php');
    }
    