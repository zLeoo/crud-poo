<?php 
	include_once "header.php"; 
	require_once("modelo/Produto.class.php");
	
	session_start();
	$listaProdutos = [];
	if(isset($_SESSION["listaProdutos"])){
		$listaProdutos = $_SESSION["listaProdutos"];
		
		unset($_SESSION["listaProdutos"]);
	}

	if (isset($_SESSION['logado'])) {
		echo $_SESSION['logado'];
		$logado = $_SESSION['logado'];
	
		if ($logado = false) {
			$_SESSION['mensagem'] = "Login e/ou senha inválido!";
			header('Location: login-usuario.php');
			unset($_SESSION["mensagem"]);
		}

	}else{
		$_SESSION['mensagem'] = "Você deve logar antes de acessar o estoque.";
		header('Location: login-usuario.php');
		unset($_SESSION["mensagem"]);
	} 

?>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Sistema de Estoque</h2>
					</div>
					<div class="col-sm-6">
						<form action="controle/ControleProduto.php" method="POST">
							<input type="submit" id="listar" class="btn btn-success" name="acao" value="Listar">
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar Produto</span></a>

						</form>
			
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>Preço</th>
						<th>Quantidade</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					
					<?php 
						foreach($listaProdutos as $produto){
							echo "<tr>";
							echo "<td>"."000".$produto->getId()."</td>";
							echo "<td>".$produto->getNome()."</td>";
							echo  "<td>".$produto->getPreco()."</td>";
							echo  "<td>".$produto->getQuantidade()."</td>";
							echo   "<td>";
							echo		"<a href='#editEmployeeModal' onclick='setupModal(".$produto->getId().',"'.$produto->getNome().'",'.$produto->getPreco().','.$produto->getQuantidade(). ")' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>";
							echo		"<a href='#deleteEmployeeModal' onclick='setupModal(".$produto->getId().',"'.$produto->getNome().'",'.$produto->getPreco().','.$produto->getQuantidade(). ")' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Deletar'>&#xE872;</i></a>";
							echo	"</td>";
							echo "</tr>";

						}

					?>
				</tbody>
			</table>
			
		</div>
	</div>        
</div>








<?php
	include_once "adicionar-produto-modal.php";
	include_once "deletar-produto-modal.php";
	include_once "editar-produto-modal.php";

	include_once "footer.php";

?>
