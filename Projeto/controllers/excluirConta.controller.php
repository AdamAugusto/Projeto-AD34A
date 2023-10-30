<?php
    require_once("repositorios/produtos.conexao.php");
    $bd = Conexao::get();
    $query = $bd->prepare("DELETE FROM usuarios WHERE id = :id");
    $query->bindParam(':id', $_SESSION['idUsuario']);
    $query->execute();
    session_destroy();
    header('Location: index.php?acao=home');