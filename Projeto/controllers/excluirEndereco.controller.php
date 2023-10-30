<?php
    require_once("repositorios/produtos.conexao.php");
    $bd = Conexao::get();
    $query = $bd->prepare("DELETE FROM endereco WHERE usuario_id = :id");
    $query->bindParam(':id', $_SESSION['idUsuario']);
    $query->execute();
    header('Location: index.php?acao=configurarConta');