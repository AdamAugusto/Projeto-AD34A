<?php 

    class Usuario{
        private $nome;
        private Cartao $cartao;
        private Carrinho $carrinho;

        private $email;
        private $senha;
        
        private $id;

        public function __construct($nome, $email, $senha, $id) {
            $this->$nome=$nome;
            $this->$email=$email;
            $this->$senha=$senha;
            $this->$id=$id;
        }
        
    }