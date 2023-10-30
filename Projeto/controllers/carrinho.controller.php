<?php 
    if(empty($_SESSION['logado']) || $_SESSION['logado'] == false){
        require('templates/header.php');
        //echo ($_SESSION['logado']);
    }else{
        if($_SESSION['logado'] == true){
            require('templates/headerLogado.php');
        }else{
            require('templates/header.php');
        } 
    }

    if(empty($_SESSION['carrinho'])){
        $osProdutos=[];
    }
    else{
            require_once('repositorios/produtos.conexao.php');
            $bd = Conexao::get();
            $acaozinha = $_GET['acao'] ?? '';
            $id = $_GET['id'] ?? '';
            if($acaozinha=='removerItem'){
                foreach($_SESSION['carrinho'] as $chave => $arrayid){
                    if($arrayid==$id){
                        unset($_SESSION['carrinho'][$chave]);
                    }
                }
            }
            if($acaozinha=='excluirCarrinho'){
                $_SESSION['carrinho']=[];
                header("Location: index.php?acao=carrinho");
            }
            $carrinhoArray = $_SESSION['carrinho'];    
            $osProdutos=[];
            $i=0;
            foreach($carrinhoArray as $id){
                
                if($i==0){
                    $query = $bd->prepare('SELECT * FROM produto WHERE id = :id');
                    $query->bindParam(':id', $id);
                    $query->execute();
                    array_push($osProdutos, $query->fetch(PDO::FETCH_ASSOC));
                    $osProdutos[$i]['quantidade']=1;
                }else {if(array_key_exists(0, $osProdutos)){
                            $b=FALSE;
                            $indice=0;
                            $m=0;
                            for($z=0; $z<sizeof($osProdutos);$z+=1){
                                if($osProdutos[$z]['id']==$id){
                                    $indice=$z;
                                    $b=TRUE;
                                }else{
                                    $m++;
                                }
                            }
                            if($b){
                                $osProdutos[$indice]['quantidade']+=1;
                            }else{
                                $query = $bd->prepare('SELECT * FROM produto WHERE id = :id');
                                $query->bindParam(':id', $id);
                                $query->execute();
                                array_push($osProdutos, $query->fetch(PDO::FETCH_ASSOC));
                                $osProdutos[$m]['quantidade']=1;
                            }
                    }
                }
                $i+=1;
                
            }
}
    require('views/carrinho.view.php');