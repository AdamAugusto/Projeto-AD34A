<?php 
    require_once("repositorios/produtos.conexao.php");
    $bd = Conexao::get();
    if(empty($_SESSION['carrinho'])){
        header('Location: index.php?acao=erro-finalizar-compra');
    }else{
            $produtosDoPedido=[];
            foreach ($_SESSION['carrinho'] as $id) {
                $indice=0;
                $flag=false;
                for($z=0;$z<sizeof($produtosDoPedido); $z++) {
                    if($produtosDoPedido[$z]["id"]==$id){
                        $flag=true;
                        $indice=$z;
                        break;
                    }else{
                        $indice++;
                    } 
                }
                if($flag){
                    $produtosDoPedido[$indice]['quantidade']+=1;
                }
                else{
                    array_push($produtosDoPedido,array(
                        "id" =>$id,
                        "quantidade" =>1,
                    ));
                }
            }
            $query = $bd->prepare('SELECT * FROM endereco WHERE usuario_id = :idUsuario');
            $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
            $query->execute();
            $o_endereco=$query->fetch(PDO::FETCH_OBJ);
            $query = $bd->prepare('SELECT * FROM cartao WHERE usuario_id = :idUsuario');
            $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
            $query->execute();
            $o_cartao=$query->fetch(PDO::FETCH_OBJ);
            $query = $bd->prepare("INSERT INTO pedido (status, data, endereco_id, transportadora, usuario_id, cartao_id) 
                                VALUES(:status, :data, :endereco_id, :transportadora, :usuario_id, :cartao_id)");
            $analise='Em Análise';
            $query->bindParam(':status', $analise);
            $data = new DateTime('now', new DateTimeZone('-03:00'));
            $dat = $data->format('d/m/Y H:i:s');
            $query->bindParam(':data', $dat);
            $query->bindParam(':endereco_id', $o_endereco->id);
            $transportadora='transportadora qualquer';
            $query->bindParam(':transportadora', $transportadora);
            $query->bindParam(':usuario_id', $_SESSION['idUsuario']);
            $query->bindParam(':cartao_id', $o_cartao->id);
            $query->execute();
            $_SESSION['carrinho']=[];
            header('Location: index.php?acao=home');
    }
    

