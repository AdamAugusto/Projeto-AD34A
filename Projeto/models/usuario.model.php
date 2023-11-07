<?php 
    require_once("repositorios/produtos.conexao.php");
    class Usuario{
        public function __construct() {
        }

        public function fazerLogin($email, $senha) {
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT * FROM usuarios WHERE email = :email AND senha = :senha');
            $query->bindParam(':email', $email);
            $query->bindParam(':senha', $senha);
            $query->execute();
            if($query->rowCount()>0){
                return $query->fetch(PDO::FETCH_OBJ);
            }else{
                return false;
            }

        }

        public function recuperarUsuarios(){
            $bd = Conexao::get();
            $query = $bd->prepare('SELECT * FROM usuarios');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function cadastrarUsuario($nome, $email, $senha){
            $bd = Conexao::get();
            $query = $bd->prepare("INSERT INTO usuarios (nome, email, senha) VALUES(:nome, :email, :senha)");
            $query->bindParam(':nome', $nome);
            $query->bindParam(':email', $email);
            $query->bindParam(':senha', $senha);
            $query->execute();
            return;
        }

        public function editarNome($nome){
            $bd = Conexao::get();
            $query = $bd->prepare("UPDATE usuarios 
            SET nome= :nome  
            WHERE id = :id");
            $query->bindParam(':id', $_SESSION['idUsuario']);
            $query->bindParam(':nome', $nome);
            $query->execute();
            return;
        }

        public function editarEmail($email){
            $bd = Conexao::get();
            $query = $bd->prepare("UPDATE usuarios 
            SET email= :email  
            WHERE id = :id");
            $query->bindParam(':id', $_SESSION['idUsuario']);
            $query->bindParam(':email', $email);
            $query->execute();
            return;
        }

        public function editarEmaileNome($email, $nome){
            $bd = Conexao::get();
            $query = $bd->prepare("UPDATE usuarios 
            SET nome= :nome, email= :email  
            WHERE id = :id");
            $query->bindParam(':id', $_SESSION['idUsuario']);
            $query->bindParam(':nome', $nome);
            $query->bindParam(':email', $email);
            $query->execute();
            return;
        }

        public function excluirConta(){
            $bd = Conexao::get();
            $query = $bd->prepare("DELETE FROM usuarios WHERE id = :id");
            $query->bindParam(':id', $_SESSION['idUsuario']);
            $query->execute();
            return;
        }
        
    }