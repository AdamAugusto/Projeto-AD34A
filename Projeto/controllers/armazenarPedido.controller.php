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
            $flag=false;
            $nomedoProduto;
            $novasQuantidade=[];
            foreach($produtosDoPedido as $produto){
                $query = $bd->prepare('SELECT * FROM produto WHERE id = :id');
                $query->bindParam(':id', $produto['id']);
                $query->execute();
                $o_produtinho=$query->fetch(PDO::FETCH_OBJ);
                if($produto['quantidade']>$o_produtinho->quantidade){
                    $flag=true;
                    $nomedoProduto=$o_produtinho->nome;
                }
                else{
                    $novaQuantidade = $o_produtinho->quantidade - $produto['quantidade'];
                    array_push($novasQuantidade, $novaQuantidade);
                }
            }

            if($flag){
                header("Location: index.php?acao=erro-finalizar-compra-quantidade&produto={$o_produtinho->nome}");
            }else{
                $query = $bd->prepare('SELECT * FROM endereco WHERE usuario_id = :idUsuario');
                $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
                $query->execute();
                $o_endereco=$query->fetch(PDO::FETCH_OBJ);
                if(!(isset($o_endereco->$id))){
                    header('Location: index.php?acao=adicionarEndereco');
                }
                else{
                    $query = $bd->prepare('SELECT * FROM cartao WHERE usuario_id = :idUsuario');
                    $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
                    $query->execute();
                    $j=0;
                    $o_cartao=$query->fetch(PDO::FETCH_OBJ);
                    if(!(isset($o_cartao->id))){
                        header('Location: index.php?acao=adicionarCartao');
                    }
                    else{
                        foreach($produtosDoPedido as $produto){
                            $query = $bd->prepare('UPDATE produto SET quantidade= :quantidade WHERE id = :id');
                            $query->bindParam(':id', $produto['id']);
                            $query->bindParam(':quantidade', $novasQuantidade[$j]);
                            $query->execute();
                            $j++;
                        }
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
                        $idPedido=$bd->lastInsertId();
                        foreach($produtosDoPedido as $produto){
                            $query = $bd->prepare("INSERT INTO pedido_item (quantidade, item_id, pedido_id) 
                            VALUES(:quantidade, :item_id, :pedido_id)");
                            $query->bindParam(':quantidade', $produto['quantidade']);
                            $query->bindParam(':item_id', $produto['id']);
                            $query->bindParam(':pedido_id', $idPedido);
                            $query->execute();
                        }
                        $_SESSION['carrinho']=[];
                        header('Location: index.php?acao=home');
                        #require('views/carrinho.view.php');
                    }
                
                }
                
            }
            
    }
    

