<?php 
    include_once "header.php"; 


	if (isset($_SESSION['mensagem'])) {
        $mensagem = $_SESSION['mensagem'];
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Oops!</strong>'. $mensagem .'
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>';
     	unset($_SESSION['mensagem']);
    }


?>

	<div class="modal-dialog">
		<div class="modal-content">
			<form action="controle/ControleProduto.php" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Entrar</h4>
				</div>
				<div class="modal-body">				
					<div class="form-group">
						<label to="usuario">Usuário</label>
						<input type="email"  id="usuario" name="usuario" class="form-control" required>
					</div>
					<div class="form-group">
						<label to="senha">Senha</label>
						<input type="password" id="senha" name="senha" class="form-control" required>
					</div>	
          <div>
            <a href="./cadastrar-usuario.php">Não possui um usuário?</a>
          </div>			
				</div>
				<div class="modal-footer d-flex justify-content-start">
					<input type="submit" class="btn btn-success" name="acao" value="Login">
				</div>
			</form>
		</div>
	</div>

<?php
	include_once "footer.php";

?>
