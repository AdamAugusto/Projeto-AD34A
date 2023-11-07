<?php 
        require('models/pedido.model.php');
        require('models/endereco.model.php');
        require('templates/headerLogado.php');
        if(isset($_SESSION['usuario'])){
                if($_SESSION['usuario'] == 'administrador'){
                        $teste = new Pedido();
                        $os_pedidos=$teste->selectPedidos();
                        require('views/listaPedidosAdmin.view.php');
                }
                else{
                        $teste = new Pedido();
                        $os_pedidos=$teste->selectPedidosbyUsuarioId();
                        $array=[];
                        $i=0;
                        foreach($os_pedidos as $pedido){
                                $testeEndereco = new Endereco();
                                $o_endereco=$testeEndereco->selectbyId($pedido->endereco_id);
                                $array[$i] = array(
                                        'pedido' => $pedido,
                                        'endereco' => $o_endereco
                                );
                                $i++;
                        }
                        require('views/listaPedidos.view.php');
                }
        }
        else{
                header('Location: index.php?acao=login');
        }
        
        