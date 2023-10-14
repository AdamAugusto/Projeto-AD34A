<?php 
    class Cartao{
        private $numero;
        private $validade;
        private $codigo;
        private $titular;



        public function __construct($numero, $validade, $codigo, $titular){
            $this->numero = $numero;
            $this->validade = $validade;
            $this->codigo = $codigo;
            $this->titular = $titular;
        }
    }