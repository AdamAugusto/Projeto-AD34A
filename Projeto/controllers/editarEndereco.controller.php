<?php 
        require_once("repositorios/produtos.conexao.php");
        $bd = Conexao::get();
        $estado = $_POST['estado'] ?? '';
        $cidade = $_POST['cidade'] ?? '';;
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
                    $query = $bd->prepare("UPDATE endereco SET estado= :estado, cidade= :cidade, bairro= :bairro, rua= :rua, numero= :numero WHERE usuario_id = :id");
                    $query->bindParam(':id', $_SESSION['idUsuario']);
                    $query->bindParam(':estado', $estado);
                    $query->bindParam(':cidade', $cidade);
                    $query->bindParam(':bairro', $bairro);
                    $query->bindParam(':rua', $rua);
                    $query->bindParam(':numero', $numero);
                    $query->execute();
                    header('Location: index.php?acao=configurarConta');
                    }
                    else{
                        $query = $bd->prepare("UPDATE endereco SET estado= :estado, cidade= :cidade, bairro= :bairro, rua= :rua, numero= :numero, complemento= :complemento WHERE usuario_id = :id");
                        $query->bindParam(':id', $_SESSION['idUsuario']);
                        $query->bindParam(':estado', $estado);
                        $query->bindParam(':cidade', $cidade);
                        $query->bindParam(':bairro', $bairro);
                        $query->bindParam(':rua', $rua);
                        $query->bindParam(':numero', $numero);
                        $query->bindParam(':complemento', $complemento);
                        $query->execute();
                        header('Location: index.php?acao=configurarConta'); 
                    }            
            }
        }