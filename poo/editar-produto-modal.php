<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="controle/ControleProduto.php" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Editar Produto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>ID</label>
						<input type="number" id="id-edit" name="id-edit" class="form-control" required readonly>
					</div>						
					<div class="form-group">
						<label>Nome</label>
						<input type="text"  id="nome-edit" name="nome-edit" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Preço</label>
						<input type="number"  id="preco-edit" name="preco-edit" min="1" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Quantidade</label>
						<input type="number" id="quantidade-edit" name="quantidade-edit" min="1" class="form-control" required>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-success" name="acao" value="Editar">
				</div>
			</form>
		</div>
	</div>
</div>