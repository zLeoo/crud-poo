<?php 
    class Produto{
        private $id;
        private $nome;
        private $preco; 
        private $quantidade;
        
        function __construct()
        {
            
        }
        public function setId($id){
            $this->id = $id;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setPreco($preco){
            $this->preco = $preco;
        }

        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }

        public function getId(){
            return $this->id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getPreco(){
            return $this->preco;
        }

        public function getQuantidade(){
            return $this->quantidade;
        }
    }

?>