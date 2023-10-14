<?php
    require_once("repositorios/produtos.conexao.php");
    $bd = Conexao::get();
    $query = $bd->prepare("DELETE FROM produto WHERE id = :id");
    $id = $_GET['id'] ?? '';
    $query->bindParam(':id', $id);
    $query->execute();
    header('Location: index.php?acao=home');