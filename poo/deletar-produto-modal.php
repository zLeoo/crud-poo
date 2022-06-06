<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="controle/ControleProduto.php" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Deletar Produto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>ID</label>
						<input type="number" id="id-delete" name="id-delete" class="form-control" required readonly>
					</div>						
					<div class="form-group">
						<label>Nome</label>
						<input type="text"  id="nome-delete" name="nome-delete" class="form-control" required readonly>
					</div>
					<div class="form-group">
						<label>Preço</label>
						<input type="number"  id="preco-delete" name="preco-delete" min="1" class="form-control" required readonly>
					</div>
					<div class="form-group">
						<label>Quantidade</label>
						<input type="number" id="quantidade-delete" name="quantidade-delete" min="1" class="form-control" required readonly>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-success" name="acao" value="Deletar">
				</div>
			</form>
		</div>
	</div>
</div>