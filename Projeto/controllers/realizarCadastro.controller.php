<?php 
    require_once("repositorios/produtos.conexao.php");
    $bd = Conexao::get();
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha1 = $_POST['senha1'] ?? '';
    $senha2 = $_POST['senha2'] ?? '';
    
    if($nome == '' || $email == '' || $senha1== '' || $senha2 == ''){
        header('Location: index.php?acao=erro-cadastro');
    }
    else{
            if($senha1 == $senha2){
                $query = $bd->prepare('SELECT * FROM usuarios');
                $query->execute();
                $usuarios = $query->fetchAll(PDO::FETCH_OBJ);
                foreach($usuarios as $usuario){
                    if($usuario->email == $email){
                        header('Location: index.php?acao=erro-usuarioJaExiste');
                    }
                    else{
                        $query = $bd->prepare("INSERT INTO usuarios (nome, email, senha) VALUES(:nome, :email, :senha)");
                        $query->bindParam(':nome', $nome);
                        $query->bindParam(':email', $email);
                        $query->bindParam(':senha', $senha1);
                        $query->execute();
                        header('Location: index.php?acao=home');
                    }
                }
            }
            else{
                header('Location: index.php?acao=erro-cadastroSenha');
            }
    }