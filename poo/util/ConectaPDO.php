<?php 
class ConectaPDO{
    private $conexao;

    public function abreConexao(){
        try{
            /* define('USER', "root");
            define('PASSWORD', "");
            define('HOST', "localhost");
            define('DATABASE', "crud_db"); */

            
            $conexao = new PDO('mysql:host=localhost;dbname=crud_db', 'root', "");
            return $conexao;
        }
        catch(PDOException $e){
            echo "Erro!". $e->getMessage();;
            die();
        }
    }

    public function fechaConexao(){
        $conexao = null;
    }
}

?>
