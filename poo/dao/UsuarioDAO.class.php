<?php 

    require_once("../modelo/Usuario.class.php");
    require_once("../util/ConectaPDO.php");

    class UsuarioDAO{
        function __construct()
        {
        }
        public function cadastrarUsuario($objUsuario){
            try{
                $conectaPDO = new ConectaPDO();
    
                $conexao = $conectaPDO->abreConexao();
    
                $sql = $conexao->prepare("INSERT INTO usuarios_estoque (login, senha)
                VALUES (:login, :senha)");
    
                $sql->bindValue(':login', $objUsuario->getNome());
                $sql->bindValue(':senha', $objUsuario->getSenha());
                
                $sql->execute();
    
                $conectaPDO->fechaConexao();

            }catch(Exception $e){
                echo "Erro ao tentar cadastrar usuario". $e->getMessage();
            }

        }

        public function logar($objUsuario){
            try{
                
                $conectaPDO = new ConectaPDO();
        
                $conexao = $conectaPDO->abreConexao();
    
                $sql = $conexao->prepare("SELECT * FROM usuarios_estoque WHERE login = :login AND senha = :senha");
                $sql->bindValue(':login', $objUsuario->getNome());
                $sql->bindValue(':senha', $objUsuario->getSenha());
                $sql->execute();
    
                $arrayUsuarios = array();
                for($i = 0; $linha = $sql->fetch(); $i++){
                    $usuario = new Usuario();
                    
                    $usuario->setNome($linha['login']);
                    $usuario->setSenha($linha['senha']);
                    
    
                    $arrayUsuarios[$i] = $usuario;
    
                    
                }
                if(count($arrayUsuarios) > 0){

                    if ($arrayUsuarios[0]->getNome() == $objUsuario->getNome() and $arrayUsuarios[0]->getSenha() == $objUsuario->getSenha()) {
                        session_start();
                        $_SESSION['logado'] = true;
                        header("Location: ../index.php");
                        $conectaPDO->fechaConexao();
                        return true;
                    } else {
                        $_SESSION['mensagem'] = "Login e/ou senha inválido!";
                        $_SESSION['logado'] = false;
                        header("Location: ../index.php");
                        $conectaPDO->fechaConexao();
                        return false;
                    }
                }else{
                    return false;
                    header("Location: ../index.php");
                }
     
                
                
            }catch(Exception $e){
                echo "Erro ao logar". $e->getMessage();
            }
        }

        



    }

?>