<?php
			include('conectaBanco.php');
			error_reporting(E_ALL & ~E_NOTICE);


			$sql="SELECT * FROM Produtos";
			$comando = $mysqli->prepare($sql);
			$comando->execute();
			$resultado = $comando->get_result();
			while ($linha =$resultado->fetch_assoc()){
				echo '<!-- Modal ';	
				echo $linha['SKU'];
				echo ' -->
				<div class="modal fade" id="';
				echo $linha['SKU'];
				echo '" tabindex="-1" role="dialog" aria-labelledby="';
				echo $linha['SKU'];
				echo 'ModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Editar ';
						echo $linha['SKU'];
						echo '</h4>
					</div>
					<div class="modal-body">
				<form method="POST" action="editar.php" enctype="multipart/form-data">
					<fieldset>
					<label for="nome" class="form-label m-2">Nome do produto</label>
					<input type="text" class="form-control m-3"  id="nome" name="Nome_Produto" size = "50" value="';
					echo $linha['Nome'];
					echo '" required>
					<label for="SKU" class="form-label m-2">SKU</label>
					<input type="text"  class="form-control m-3" id="SKU" name="SKU"  size = "50" value="';
					echo $linha['SKU'];
					echo'" required>
					<label for="foto" class="form-label m-2">Foto</label>
					<input type="file"  class="form-control m-3" id="foto" name="Foto" accept="image">
					<label for="descricao" class="form-label m-2">Decrição</label>
					<textarea id="descricao"  class="form-control m-3" id="descricao" name="Descricao" rows="4" cols="50">';
					echo $linha['Descricao'];
					echo'</textarea>
					<label for="estoque" class="form-label m-2">Estoque</label>
					<input type="number"  class="form-control m-3" id="estoque" name="Estoque" size = "50" value="';
					echo $linha['Estoque'];
					echo'">
					<label for="preco" class="form-label m-2">Preço</label>
					<input type="number"  class="form-control m-3" id="preco" step="0.01" name="Preco" size = "50" value="';
					echo $linha['Preco'];
					echo'">
					<label for="variacao" class="form-label m-3">Tipo de variação</label>
					<select name="Variacao" class="form-control m-3" id="variacao">
									<option value="0">Nenhum</option>
									<option value="1">Cor</option>
									<option value="2">Tamanho</option>
									<option value="3">Cor e Tamanho</option>
									</select>
					<label for="DescVariacao" class="form-label m-2">Descrição da Variação</label>
					<textarea id="Desc_Variacao"  class="form-control m-3" id="DescVariacao" name="Desc_Variacao" rows="4" cols="50"></textarea>
					<input type="submit" Value="Editar" class="btn btn-warning m-3">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</fieldset>
					</form>
				</div>
					<div class="modal-footer">
					</div>
					</div>
				</div>
				</div>';
			}
		?>

