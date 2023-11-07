<?php 
    require('models/usuario.model.php');
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    
    if($nome == '' && $email == ''){
        header('Location: index.php?acao=erro-editar-cadastro');
    }else{
        if(empty($_SESSION['idUsuario'])){
            header('Location: index.php?acao=erro-editar-cadastro-admin');
        }else{
            if($nome==''){
                $teste = new Usuario();
                $teste->editarEmail($email);
                $_SESSION['emailUsuario'] = $email;
                header('Location: index.php?acao=configurarConta');
            }else{
                if($email==''){
                    $teste = new Usuario();
                    $teste->editarNome($nome);
                    $_SESSION['usuario'] = $nome;
                    header('Location: index.php?acao=configurarConta');
                }else{
                    $teste = new Usuario();
                    $teste->editarEmaileNome($email, $nome);
                    $_SESSION['usuario'] = $nome;
                    $_SESSION['emailUsuario'] = $email;
                    header('Location: index.php?acao=configurarConta');
                }                
            }
        }
    }