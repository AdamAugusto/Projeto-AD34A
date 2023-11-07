<?php
    require('models/endereco.model.php');
    $teste = new Endereco();
    $teste->excluirEndereco();
    header('Location: index.php?acao=configurarConta');