<?php 
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $erro = false;
    $logssss = $_POST['estaLogado'] ?? '';
    


    if($usuario == 'admin@admin.com' && $senha == '000000'){
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = 'administrador';
        $_SESSION['test'] = false;
        //header('Location: index.php');
        require('controllers/homePage.controller.php');

    }else if(!empty($_POST)){
        $erro = true;
        header('Location: index.php?acao=loginErro');
    }
