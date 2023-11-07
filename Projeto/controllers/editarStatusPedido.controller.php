<?php 
    require('models/pedido.model.php');
    $id = $_GET['id'] ?? '';
    $atualiza = $_GET['acao2'] ?? '';
    if($id == ''){

    }else{
        if($atualiza == ''){
            $teste = new Pedido();
            $pedido=$teste->selectPedidobyId($id);
        }else{
            switch($atualiza){
                case 'pedidoConfirmado':
                    $status = 'Pedido Confirmado';
                    $teste = new Pedido();
                    $teste->editarStatusPedido($id, $status);
                    header('Location: index.php?acao=listaPedidos');
                    break;

                case 'emSeparacao':
                    $status = 'Em Separação';
                    $teste = new Pedido();
                    $teste->editarStatusPedido($id, $status);
                    header('Location: index.php?acao=listaPedidos');
                    break;

                case 'pedidoEnviado':
                    $status = 'Pedido Enviado';
                    $teste = new Pedido();
                    $teste->editarStatusPedido($id, $status);
                    header('Location: index.php?acao=listaPedidos');
                    break;

                case 'pedidoEntregue':
                    $status = 'Pedido Entregue';
                    $teste = new Pedido();
                    $teste->editarStatusPedido($id, $status);
                    header('Location: index.php?acao=listaPedidos');
                    break;

            }    
        }
    }

     require('templates/headerLogado.php');
     require('views/editarStatusPedido.view.php');