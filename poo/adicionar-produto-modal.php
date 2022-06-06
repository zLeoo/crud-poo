<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="controle/ControleProduto.php" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Adicionar Produto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Nome</label>
						<input type="text" name="nome" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Preço</label>
						<input type="number" name="preco" min="1" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Quantidade</label>
						<input type="number" name="quantidade" min="1" class="form-control" required>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-success" name="acao" value="Cadastrar">
				</div>
			</form>
		</div>
	</div>
</div>