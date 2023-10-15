<?php
    require_once("repositorios/produtos.conexao.php");
    $bd = Conexao::get();
    $usuario = addslashes($_POST['usuario']) ?? '';
    $senha = addslashes($_POST['senha']) ?? '';
    $erro = false;
    $logssss = $_POST['estaLogado'] ?? '';
    


    if($usuario == 'admin@admin.com' && $senha == '123456'){
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = 'administrador';
        header('Location: index.php?acao=home');

    }else{
        $query = $bd->prepare('SELECT * FROM usuarios WHERE email = :email AND senha = :senha');
        $query->bindParam(':email', $usuario);
        $query->bindParam(':senha', $senha);
        $query->execute();
        if($query->rowCount()>0){
            $o_usuario = $query->fetch(PDO::FETCH_OBJ);
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