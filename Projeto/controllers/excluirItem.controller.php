<?php
    require('models/produto.model.php');
    $id = $_GET['id'] ?? '';
    $teste = new Produto();
    $teste->excluirProduto($id);
    header('Location: index.php?acao=home');