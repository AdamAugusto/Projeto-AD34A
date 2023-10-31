<?php 
    require_once('repositorios/produtos.conexao.php');
    $bd = Conexao::get();

    $id = $_GET['id'] ?? '';
    $atualiza = $_GET['acao2'] ?? '';
    if($id == ''){

    }else{
        if($atualiza == ''){
            $query = $bd->prepare('SELECT * FROM pedido WHERE id = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            $pedido=$query->fetch(PDO::FETCH_OBJ);
        }else{
            switch($atualiza){
                case 'pedidoConfirmado':
                    $status = 'Pedido Confirmado';
                    $query = $bd->prepare("UPDATE pedido 
                    SET status= :status WHERE id = :id");
                    $query->bindParam(':id', $id);
                    $query->bindParam(':status', $status);
                    $query->execute();
                    header('Location: index.php?acao=listaPedidos');
                    break;

                case 'emSeparacao':
                    $status = 'Em Separação';
                    $query = $bd->prepare("UPDATE pedido 
                    SET status= :status WHERE id = :id");
                    $query->bindParam(':id', $id);
                    $query->bindParam(':status', $status);
                    $query->execute();
                    header('Location: index.php?acao=listaPedidos');
                    break;

                case 'pedidoEnviado':
                    $status = 'Pedido Enviado';
                    $query = $bd->prepare("UPDATE pedido 
                    SET status= :status WHERE id = :id");
                    $query->bindParam(':id', $id);
                    $query->bindParam(':status', $status);
                    $query->execute();
                    header('Location: index.php?acao=listaPedidos');
                    break;

                case 'pedidoEntregue':
                    $status = 'Pedido Entregue';
                    $query = $bd->prepare("UPDATE pedido 
                    SET status= :status WHERE id = :id");
                    $query->bindParam(':id', $id);
                    $query->bindParam(':status', $status);
                    $query->execute();
                    header('Location: index.php?acao=listaPedidos');
                    break;

            }    
        }
    }

     require('templates/headerLogado.php');
     require('views/editarStatusPedido.view.php');