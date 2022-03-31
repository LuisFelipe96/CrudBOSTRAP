<?php
			include('conectaBanco.php');
			error_reporting(E_ALL & ~E_NOTICE);


			$sql="SELECT * FROM Produtos";
			$comando = $mysqli->prepare($sql);
			$comando->execute();
			$resultado = $comando->get_result();
			
			while ($linha =$resultado->fetch_assoc()){
				$SKU=$linha['SKU'];
				//echo '<br>';
				//echo $SKU;
				
				$sql="SELECT * FROM Variacao_Desc WHERE SKU = ?";
				//echo $sql;
				//echo '<br>';
				$comando2 = $mysqli->prepare($sql);
				if($comando2){
					//echo "ok";
					//echo '<br>';
				}
			   else{
					//echo "erro";
					//echo '<br>';
			   }
				$comando2->bind_param('s',$SKU);
				if ($comando2->execute()===TRUE){
					//echo 'ok';
				}else{
					//echo 'erro';
				}
				$resultado2 = $comando2->get_result();
				while ($var = $resultado2->fetch_assoc()){
					//print_r($var);
					$Variacao=$var['Variacao'];
					$Desc_Variacao=$var['Desc_Variacao'];
				}
				/*
				
				
				$resultado = $comando->get_result();
				$var = $resultado->fetch_assoc();*/
				//print_r($linha);
				/*print_r($var);
				$Variacao=$var['Variacao'];
				$Desc_Variacao=$var['Desc_Variacao'];*/
				echo '<!-- Modal ';	
				echo $linha['SKU'];
				echo 'Excluir -->
				<div class="modal fade" id="';
				echo $linha['SKU'];
				echo 'Excluir" tabindex="-1" role="dialog" aria-labelledby="';
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
				<form method="POST" action="excluir.php" enctype="multipart/form-data">
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
					<select name="Variacao" class="form-control m-3" id="variacao">';
									switch ($Variacao) {
										case 0:
											echo '<option value="0">Nenhum</option>';
											break;
										case 1:
											echo '<option value="1">Cor</option>';
											break;
										case 2:
											echo '<option value="Tamanho">Tamanho</option>';
											break;
										case 3:
											echo '<option value="Cor_Tamanho">Cor e Tamanho</option>';
											break;
								   }
									echo '</select>
					<label for="DescVariacao" class="form-label m-2">Descrição da Variação</label>
					<textarea id="Desc_Variacao"  class="form-control m-3" id="DescVariacao" name="Desc_Variacao" rows="4" cols="50">';
					echo $Desc_Variacao;
					echo '</textarea>
					<input type="submit" Value="Excluir" class="btn btn-danger m-3">
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