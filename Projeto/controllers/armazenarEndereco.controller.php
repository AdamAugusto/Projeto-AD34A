<?php 
    require_once("repositorios/produtos.conexao.php");
    $bd = Conexao::get();
    $estado = $_POST['estado'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $bairro = $_POST['bairro'] ?? '';
    $rua = $_POST['rua'] ?? '';