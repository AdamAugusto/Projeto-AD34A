<?php 
    require_once("repositorios/produtos.conexao.php");
    $bd = Conexao::get();
    $estado = $_POST['estado'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $bairro = $_POST['bairro'] ?? '';
    $rua = $_POST['rua'] ?? '';
    $numero = $_POST['numero'] ?? '';
    $complemento = $_POST['complemento'] ?? '';

    if($numero == '' || $rua == '' || $bairro == '' || $cidade == '' || $estado == ''){
        header('Location: index.php?acao=erro-cadastro-endereco');
    }else{
        if(empty($_SESSION['idUsuario'])){
            header('Location: index.php?acao=erro-cadastro-endereco-admin');
        }else{
            if($complemento== ''){
                $query = $bd->prepare("INSERT INTO endereco (estado, cidade, bairro, rua, numero, usuario_id) 
                VALUES(:estado, :cidade, :bairro, :rua, :numero, :usuario_id)");
                $query->bindParam(':estado', $estado);
                $query->bindParam(':cidade', $cidade);
                $query->bindParam(':bairro', $bairro);
                $query->bindParam(':rua', $rua);
                $query->bindParam(':numero', $numero);
                $query->bindParam(':usuario_id', $_SESSION['idUsuario']);
                $query->execute();
                header('Location: index.php?acao=configurarConta');
                }
                else{
                    $query = $bd->prepare("INSERT INTO endereco (estado, cidade, bairro, rua, numero, complemento, usuario_id) 
                    VALUES(:estado, :cidade, :bairro, :rua, :numero, :complemento, :usuario_id)");
                    $query->bindParam(':estado', $estado);
                    $query->bindParam(':cidade', $cidade);
                    $query->bindParam(':bairro', $bairro);
                    $query->bindParam(':rua', $rua);
                    $query->bindParam(':numero', $numero);
                    $query->bindParam(':complemento', $complemento);
                    $query->bindParam(':usuario_id', $_SESSION['idUsuario']);
                    $query->execute();
                    header('Location: index.php?acao=configurarConta'); 
                }            
        }
    }