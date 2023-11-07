<?php
    require('models/usuario.model.php');
    $teste = new Usuario();
    $teste->excluirConta();
    session_destroy();
    header('Location: index.php?acao=home');