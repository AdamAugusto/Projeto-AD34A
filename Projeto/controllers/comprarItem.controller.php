<?php 
    if(empty($_SESSION['logado']) || $_SESSION['logado'] == false){
        header('Location: index.php?acao=login');
    }else{
        if($_SESSION['logado'] == true){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare("SELECT * FROM produto WHERE id = :id");
            $id = $_GET['id'] ?? '';
            $query->bindParam(':id', $id);
            $query->execute();
            $produto = $query->fetch(PDO::FETCH_OBJ);
            $_SESSION['carrinho'][]= $produto;
            ?><script>console.log("<?=$produto?>");</script>
            <?php
            header('Location: index.php?acao=carrinho');
        }
    }   
    