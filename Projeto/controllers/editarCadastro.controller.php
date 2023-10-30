<?php 
    require_once("repositorios/produtos.conexao.php");
    $bd = Conexao::get();
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    
    if($nome == '' && $email == ''){
        header('Location: index.php?acao=erro-editar-cadastro');
    }else{
        if(empty($_SESSION['idUsuario'])){
            header('Location: index.php?acao=erro-editar-cadastro-admin');
        }else{
            if($nome==''){
                $query = $bd->prepare("UPDATE usuarios 
                SET email= :email  
                WHERE id = :id");
                $query->bindParam(':id', $_SESSION['idUsuario']);
                $query->bindParam(':email', $email);
                $query->execute();
                $_SESSION['emailUsuario'] = $email;
                header('Location: index.php?acao=configurarConta');
            }else{
                if($email==''){
                    $query = $bd->prepare("UPDATE usuarios 
                    SET nome= :nome  
                    WHERE id = :id");
                    $query->bindParam(':id', $_SESSION['idUsuario']);
                    $query->bindParam(':nome', $nome);
                    $query->execute();
                    $_SESSION['usuario'] = $nome;
                    header('Location: index.php?acao=configurarConta');
                }else{
                    $query = $bd->prepare("UPDATE usuarios 
                    SET nome= :nome, email= :email  
                    WHERE id = :id");
                    $query->bindParam(':id', $_SESSION['idUsuario']);
                    $query->bindParam(':nome', $nome);
                    $query->bindParam(':email', $email);
                    $query->execute();
                    $_SESSION['usuario'] = $nome;
                    $_SESSION['emailUsuario'] = $email;
                    header('Location: index.php?acao=configurarConta');
                }                
            }
        }
    }