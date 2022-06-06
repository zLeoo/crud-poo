<?php 

    require_once("../modelo/Produto.class.php");
    require_once("../util/ConectaPDO.php");

    class ProdutoDAO{
        function __construct()
        {
        }
        public function cadastrarProduto($objProduto){
            try{
                $conectaPDO = new ConectaPDO();
    
                $conexao = $conectaPDO->abreConexao();
    
                $sql = $conexao->prepare("INSERT INTO produtos_estoque (nome, preco, quantidade)
                VALUES (:nome, :preco, :quantidade)");
    
                $sql->bindValue(':nome', $objProduto->getNome());
                $sql->bindValue(':preco', $objProduto->getPreco());
                $sql->bindValue(':quantidade', $objProduto->getQuantidade());
                $sql->execute();
    
                $conectaPDO->fechaConexao();

            }catch(Exception $e){
                echo "Erro ao tentar cadastrar produto". $e->getMessage();
            }

        }

        public function listarProdutos(){
            try{
                
                $conectaPDO = new ConectaPDO();
        
                $conexao = $conectaPDO->abreConexao();
    
                $sql = $conexao->prepare("SELECT * FROM produtos_estoque");
    
                $sql->execute();
    
                $arrayProdutos = array();
                for($i = 0; $linha = $sql->fetch(); $i++){
                    $produto = new Produto();
                    $produto->setId($linha['id']);
                    $produto->setNome($linha['nome']);
                    $produto->setPreco($linha['preco']);
                    $produto->setQuantidade($linha['quantidade']);
    
                    $arrayProdutos[$i] = $produto;
    
                    
                }
                
                $conectaPDO->fechaConexao();
                return $arrayProdutos;
            }catch(Exception $e){
                echo "Erro ao listar produtos". $e->getMessage();
            }
        }

        public function editarProduto($objProduto){
            try{
                $conectaPDO = new ConectaPDO();
        
                $conexao = $conectaPDO->abreConexao();

                $sql = $conexao->prepare("UPDATE produtos_estoque SET nome=:nome, preco=:preco, quantidade=:quantidade
                WHERE id=:id");
                $sql->bindValue(':id', $objProduto->getId());
                $sql->bindValue(':nome', $objProduto->getNome());
                $sql->bindValue(':preco', $objProduto->getPreco());
                $sql->bindValue(':quantidade', $objProduto->getQuantidade());
                $sql->execute();
    
            }catch(Exception $e){
                echo "Erro ao editar produtos". $e->getMessage();
            }
        }

        public function deletarProduto($objProduto){
            try{
                $conectaPDO = new ConectaPDO();
        
                $conexao = $conectaPDO->abreConexao();

                $sql = $conexao->prepare("DELETE FROM produtos_estoque WHERE id=:id");
                $sql->bindValue(':id', $objProduto->getId());
                $sql->execute();
                
            }catch(Exception $e){
                echo "Erro ao deletar produtos". $e->getMessage();
            }
        }



    }

?>