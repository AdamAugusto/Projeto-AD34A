<?php 
    require_once("repositorios/produtos.conexao.php");
    $bd = Conexao::get();
    require('models/produto.model.php');
    require('models/usuario.model.php');
    require('models/endereco.model.php');
    require('models/cartao.model.php');
    require('models/pedido.model.php');
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
            $teste = new Produto();
            foreach($produtosDoPedido as $produto){
                $o_produtinho=$teste->selectbyId($produto["id"]);
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
                $testeEndereco = new Endereco();
                $o_endereco=$testeEndereco->selectbyUsuarioId();
                if(!(isset($o_endereco->id))){
                    header('Location: index.php?acao=adicionarEndereco');
                }
                else{
                    $j=0;
                    $testeCartao = new Cartao();
                    $o_cartao=$testeCartao->selectbyUsuarioId();
                    if(!(isset($o_cartao->id))){
                        header('Location: index.php?acao=adicionarCartao');
                    }
                    else{
                        foreach($produtosDoPedido as $produto){
                            $testeProduto = new Produto();
                            $testeProduto->editarQuantidade($produto['id'],$novasQuantidade[$j]);
                            $j++;
                        }
                        $testePedido = new Pedido();
                        $idPedido=$testePedido->armazenarPedido($o_endereco->id, $o_cartao->id);                        
                        foreach($produtosDoPedido as $produto){
                            $testePedido->armazenarPedidoItem($produto['quantidade'], $produto['id'], $idPedido[$j]);
                        }
                        $_SESSION['carrinho']=[];
                        header('Location: index.php?acao=home');
                        #require('views/carrinho.view.php');
                    }
                
                }
                
            }
            
    }
    

