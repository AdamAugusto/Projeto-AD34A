<?php
    require_once("repositorios/produtos.conexao.php");
    $bd = Conexao::get();
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
            $query = $bd->prepare("INSERT INTO cartao (numero, titular, validade, codigo, usuario_id) VALUES(:numero, :titular, :validade, :codigo, :usuario_id)");
            $query->bindParam(':numero', $numero);
            $query->bindParam(':titular', $titular);
            $query->bindParam(':validade', $validade);
            $query->bindParam(':codigo', $cvv);
            $query->bindParam(':usuario_id', $_SESSION['idUsuario']);
            $query->execute();
            header('Location: index.php?acao=home');
        }
    }