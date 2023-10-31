<?php 
        require_once('repositorios/produtos.conexao.php');
        $bd = Conexao::get();
        require('templates/headerLogado.php');
        if(isset($_SESSION['usuario'])){
                if($_SESSION['usuario'] == 'administrador'){
                        $query = $bd->prepare('SELECT * FROM pedido');
                        $query->execute();
                        $os_pedidos=$query->fetchAll(PDO::FETCH_OBJ);
                        require('views/listaPedidosAdmin.view.php');
                }
                else{
                        $query = $bd->prepare('SELECT * FROM pedido WHERE usuario_id = :idUsuario');
                        $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
                        $query->execute();
                        $os_pedidos=$query->fetchAll(PDO::FETCH_OBJ);
                        $array=[];
                        $i=0;
                        foreach($os_pedidos as $pedido){
                                $query = $bd->prepare('SELECT * FROM endereco WHERE id = :id');
                                $query->bindParam(':id', $pedido->endereco_id);
                                $query->execute();
                                $o_endereco=$query->fetch(PDO::FETCH_OBJ);
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
        
        