<?php
    require('models/usuario.model.php');
    $usuario = addslashes($_POST['usuario']) ?? '';
    $senha = addslashes($_POST['senha']) ?? '';
    $erro = false;
    $logssss = $_POST['estaLogado'] ?? '';
    


    if($usuario == 'admin@admin.com' && $senha == '123456'){
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = 'administrador';
        header('Location: index.php?acao=home');

    }else{
            $teste = new Usuario();
            $o_usuario = $teste->fazerLogin($usuario, $senha);
        if($o_usuario){
            $_SESSION['logado'] = true;
            $_SESSION['usuario'] = $o_usuario->nome;
            $_SESSION['idUsuario'] = $o_usuario->id;
            $_SESSION['emailUsuario'] = $o_usuario->email;
            header('Location: index.php?acao=home');
        }
        else{
            header('Location: index.php?acao=loginErro');
            if(!empty($_POST)){
                $erro = true;
                header('Location: index.php?acao=loginErro');
        }
    }
    }