<?php 
    class Produto {
        private $nome;
        private $preco;
        private $quantidade;
        private $descricao;
        private $imagem;
        private $categoria;

        public function __construct($nome, $preco, $quantidade, $descricao, $categoria){
            $this->nome = $nome;
            $this->preco = $preco;
            $this->quantidade = $quantidade;
            $this->descricao = $descricao;
            $this->categoria = $categoria;
        }
    }