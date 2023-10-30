<?php
    if(empty($_SESSION["idUsuario"])) {
        $verificador=false;
        require('templates/headerLogadoUsuario.php');
        require('models/cidades.model.php');
        require('views/adicionarEndereco.view.php');
    }
    else{
        require_once("repositorios/produtos.conexao.php");
        $bd = Conexao::get();
        $query = $bd->prepare('SELECT * FROM endereco WHERE usuario_id = :id');
        $query->bindParam(':id', $_SESSION['idUsuario']);
        $query->execute();
        $verificaEndereco = $query->fetchAll(PDO::FETCH_OBJ);
        if(sizeof($verificaEndereco)==0) {
            $verificador=false;
        }
        else{
            $verificador = true;
        }
        require('templates/headerLogadoUsuario.php');
        require('models/cidades.model.php');
        require('views/adicionarEndereco.view.php');
    }
