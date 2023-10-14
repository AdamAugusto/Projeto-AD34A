<?php
    require_once("repositorios/produtos.conexao.php");
    $bd = Conexao::get();
    $numero = $_POST['numero'] ?? '';
    $titular = $_POST['titular'] ?? '';
    $validade = $_POST['validade'] ?? '';
    $cvv = $_POST['cvv'] ?? '';

    if($numero == '' || $titular == '' || $validade == '' || $cvv == ''){
        header('Location: index.php?acao=erro-cadastro');
    }else{ 
        $query = $bd->prepare("INSERT INTO cartao (numero, titular, validade, cvv) VALUES(:numero, :titular, :validade, :cvv)");
        $query->bindParam(':numero', $numero);
        $query->bindParam(':titular', $titular);
        $query->bindParam(':quantidade', $validade);
        $query->bindParam(':cvv', $cvv);
        $query->execute();
        header('Location: index.php?acao=erro-cadastro');
    }