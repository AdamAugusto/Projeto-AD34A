<?php 
    require('models/usuario.model.php');
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha1 = $_POST['senha1'] ?? '';
    $senha2 = $_POST['senha2'] ?? '';
    
    if($nome == '' || $email == '' || $senha1== '' || $senha2 == ''){
        header('Location: index.php?acao=erro-cadastro');
    }
    else{
            if($senha1 == $senha2){
                $teste = new Usuario();
                $usuarios= $teste->recuperarUsuarios();
                $flag=false;
                foreach($usuarios as $usuario){
                    if($usuario->email == $email){
                        $flag=true;
                    }
                }
                if($flag){
                    header('Location: index.php?acao=erro-usuarioJaExiste');
                }else{
                    $teste->cadastrarUsuario($nome, $email, $senha1);
                    header('Location: index.php?acao=home');
                }
            }
            else{
                header('Location: index.php?acao=erro-cadastroSenha');
            }
    }