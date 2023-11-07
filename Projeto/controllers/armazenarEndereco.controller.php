<?php 
    require('models/endereco.model.php');
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
                $teste = new Endereco();
                $teste->armazenaEndereco($estado, $cidade, $bairro, $rua, $numero);
                header('Location: index.php?acao=configurarConta');
                }
                else{
                    $teste = new Endereco();
                    $teste->armazenaEnderecoComplemento($estado, $cidade, $bairro, $rua, $numero, $complemento);
                    header('Location: index.php?acao=configurarConta'); 
                }            
        }
    }