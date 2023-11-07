<?php 

    class Pedido {
        public function __construct() {}
        
        public function armazenarPedido($enderecoId, $cartaoId){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare("INSERT INTO pedido (status, data, endereco_id, transportadora, usuario_id, cartao_id) 
            VALUES(:status, :data, :endereco_id, :transportadora, :usuario_id, :cartao_id)");
            $analise='Em Análise';
            $query->bindParam(':status', $analise);
            $data = new DateTime('now', new DateTimeZone('-03:00'));
            $dat = $data->format('d/m/Y H:i:s');
            $query->bindParam(':data', $dat);
            $query->bindParam(':endereco_id', $enderecoId);
            $transportadora='transportadora qualquer';
            $query->bindParam(':transportadora', $transportadora);
            $query->bindParam(':usuario_id', $_SESSION['idUsuario']);
            $query->bindParam(':cartao_id', $cartaoId);
            $query->execute();
            return $bd->lastInsertId();
        }

        public function armazenarPedidoItem($quantidade, $produtoId, $pedidoId){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare("INSERT INTO pedido_item (quantidade, item_id, pedido_id) 
            VALUES(:quantidade, :item_id, :pedido_id)");
            $query->bindParam(':quantidade', $quantidade);
            $query->bindParam(':item_id', $produtoId);
            $query->bindParam(':pedido_id', $pedidoId);
            $query->execute();
        }

        public function selectPedidos(){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT * FROM pedido');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function selectPedidosbyUsuarioId(){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT * FROM pedido WHERE usuario_id = :idUsuario');
            $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function selectUltimoPedido(){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT MAX(id) FROM pedido WHERE usuario_id = :idUsuario');
            $query->bindParam(':idUsuario', $_SESSION['idUsuario']);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }

        public function selectPedidobyId($id){
            require_once("repositorios/produtos.conexao.php");
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT * FROM pedido WHERE id = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function editarStatusPedido($id, $status){
            require_once('repositorios/produtos.conexao.php');
            $bd = Conexao::get();
            $query = $bd->prepare("UPDATE pedido 
            SET status= :status WHERE id = :id");
            $query->bindParam(':id', $id);
            $query->bindParam(':status', $status);
            $query->execute();
            return;
        }
    }