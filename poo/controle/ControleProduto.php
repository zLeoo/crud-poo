<?php 
    require_once("../modelo/Produto.class.php");
    require_once("../dao/ProdutoDAO.class.php");

    require_once("../modelo/Usuario.class.php");
    require_once("../dao/UsuarioDAO.class.php");

    header("Content-type: text/html; charset=utf-8");

    $acao="";
    if(isset($_POST['acao'])){
        $acao = $_POST["acao"];

    }
    else{
        //$acao = $_GET["acao"];
        $acao = "listar";
        //header('Location: ../index.php');
    }

    switch($acao){
        case 'Cadastrar':
            cadastrar();
            break;
        case 'Editar':
            editar();
            break;
        case 'Deletar':
            deletar();
            break;
        case 'Listar':
            listar();
            break;
        case 'Cadastrar Usuario':
            cadastrarUsuario();
            break;
        case 'Login':
            Login();
            break;
        default:
        echo "Opção não encontrada";
        break;
    }
    
    function listar(){
        $ProdutoDAO = new ProdutoDAO();
        $array_produtos = $ProdutoDAO->listarProdutos();
        session_start();

        $_SESSION["listaProdutos"] = $array_produtos;
        header('Location: ../index.php');
    }
    function cadastrar(){
        
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];

        $produto = new Produto();

        $produto->setNome($nome);
        $produto->setPreco($preco);
        $produto->setQuantidade($quantidade);

        $ProdutoDAO = new ProdutoDAO();
        $ProdutoDAO->cadastrarProduto($produto);

        header("Location: ../index.php");
    }
    function editar(){
        $id = $_POST['id-edit'];
        $nome = $_POST['nome-edit'];
        $preco = $_POST['preco-edit'];
        $quantidade = $_POST['quantidade-edit'];

        $produto = new Produto();

        $produto->setId($id);
        $produto->setNome($nome);
        $produto->setPreco($preco);
        $produto->setQuantidade($quantidade);

        $ProdutoDAO = new ProdutoDAO();
        $ProdutoDAO->editarProduto($produto);

        header("Location: ../index.php");
    }
    function deletar(){
        $id=$_POST['id-delete'];
        $produto = new Produto();

        $produto->setId($id);
        $ProdutoDAO = new ProdutoDAO();
        $ProdutoDAO->deletarProduto($produto);

        header("Location: ../index.php");

    }

    function cadastrarUsuario(){
        $nome = $_POST['usuario'];
        $senha = $_POST['senha'];
        $usuario = new Usuario();

        
        $usuario->setNome($nome);
        $usuario->setSenha($senha);
        $UsuarioDAO = new UsuarioDAO();
        $UsuarioDAO->cadastrarUsuario($usuario);
        
        header("Location: ../index.php");
    }

    function login(){   
        $nome = $_POST['usuario'];
        $senha = $_POST['senha'];
        

        $usuario = new Usuario();

        
        $usuario->setNome($nome);
        $usuario->setSenha($senha);
        

        $UsuarioDAO = new UsuarioDAO();
        
        $UsuarioDAO->logar($usuario);
        
        header("Location: ../index.php");
    }

?>