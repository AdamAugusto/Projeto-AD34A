<?php
    require('models/cartao.model.php');
    $numero = $_POST['numero'] ?? '';
    $titular = $_POST['titular'] ?? '';
    $validade = $_POST['validade'] ?? '';
    $cvv = $_POST['cvv'] ?? '';

    if($numero == '' || $titular == '' || $validade == '' || $cvv == ''){
        header('Location: index.php?acao=erro-cadastro-cartao');
    }else{
        if(empty($_SESSION['idUsuario'])){
            header('Location: index.php?acao=erro-cadastro-cartao-admin');
        }else{
            $teste = new Cartao();
            $teste->armazenarCartao($numero, $titular, $validade, $cvv);
            header('Location: index.php?acao=home');
        }
    }