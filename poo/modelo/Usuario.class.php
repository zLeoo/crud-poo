<?php 
    class Usuario{
        private $nome;
        private $senha; 

        
        function __construct()
        {
            
        }
    

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setSenha($senha){
            $this->senha = $senha;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getSenha(){
            return $this->senha;
        }

        
    }

?>