<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
		
		<title>Sistema de Cadastro de Produtos</title>
	</head>
	<body>
		<div class="container-fluid">
			<h1>Teste</h1>
			<h2>Teste</h2>
			<button type="button" class="btn btn-dark">Cadastro</button>

			
		</div>



		
		<div class="container-fluid">
			<div class="row">
				<div class="row">
					<div class="col">
						SKU
					</div>
					<div class="col">
						Foto
					</div>
					<div class="col">
						Nome
					</div>
					<div class="col">
						Descrição
					</div>
					<div class="col">
						estoque
					</div>
					<div class="col">
						preco
					</div>
				</div>
			</div>
		</div>
		<table class="table">
			<thead>
				<tr class="table-dark">
				<th scope="col">SKU</th>
				<th scope="col">Nome</th>
				<th scope="col">estoque</th>
				<th scope="col">preco</th>
				<th scope="col"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalCadastro">Cadastrar</button></th>
				</tr>
			</thead>
			<tbody>
				<?php
					include('conectaBanco.php');
					error_reporting(E_ALL & ~E_NOTICE);


					$sql="SELECT * FROM Produtos";
					$comando = $mysqli->prepare($sql);
					$comando->execute();
					$resultado = $comando->get_result();
					while ($linha =$resultado->fetch_assoc()){
						//print_r($linha);

						echo '<tr>';
						echo '<th scope="col">';
						echo $linha['SKU'];
						echo '</th>';
						echo '<th scope="col">';
						echo $linha['Nome'];
						echo '</th>';
						echo '<th scope="col">';
						echo $linha['Estoque'];
						echo '</th>';
						echo '<th scope="col">';
						echo $linha['Preco'];
						echo '</th>';
						/*echo '<th scope="col"> <a class="btn btn-warning" href="#';
						echo $linha['SKU'];
						echo '" role="button">Editar</a>';
						echo '  <a class="btn btn-danger" href="#';
						echo $linha['SKU'];
						echo '" role="button">Deletar</a></th>';*/
						echo '<th>';
						echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#';
						echo $linha['SKU'];
						echo '">Editar</button>';
						echo ' <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#';
						echo $linha['SKU'];
						echo '">Excluir</button>';
						echo '</th>';


						echo '</tr>';
					}
	
				
				?>
				
			</tbody>
		</table>

		<!-- Modal Cadastro-->
		<div class="modal fade" id="ModalCadastro" role="dialog">
			<div class="modal-dialog">
			
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title">Cadastro</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				<form method="POST" action="cadastro.php" enctype="multipart/form-data">
					<fieldset>
					<label for="nome" class="form-label m-2">Nome do produto</label>
					<input type="text" class="form-control m-3"  id="nome" name="Nome_Produto" size = "50" required>
					<label for="SKU" class="form-label m-2">SKU</label>
					<input type="text"  class="form-control m-3" id="SKU" name="SKU"  size = "50" required>
					<label for="foto" class="form-label m-2">Foto</label>
					<input type="file"  class="form-control m-3" id="foto" name="Foto" accept="image">
					<label for="descricao" class="form-label m-2">Decrição</label>
					<textarea id="descricao"  class="form-control m-3" id="descricao" name="Descricao" rows="4" cols="50"></textarea>
					<label for="estoque" class="form-label m-2">Estoque</label>
					<input type="number"  class="form-control m-3" id="estoque" name="Estoque" size = "50">
					<label for="preco" class="form-label m-2">Preço</label>
					<input type="number"  class="form-control m-3" id="preco" step="0.01" name="Preco" size = "50">
					<label for="variacao" class="form-label m-3">Tipo de variação</label>
					<select name="Variacao" class="form-control m-3" id="variacao">
									<option value="0">Nenhum</option>
									<option value="1">Cor</option>
									<option value="2">Tamanho</option>
									<option value="3">Cor e Tamanho</option>
									</select>
					<label for="DescVariacao" class="form-label m-2">Descrição da Variação</label>
					<textarea id="Desc_Variacao"  class="form-control m-3" id="DescVariacao" name="Desc_Variacao" rows="4" cols="50"></textarea>
					<input type="submit" Value="Cadastrar" class="btn btn-primary m-3">
					</fieldset>
					</form>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
			
			</div>
		</div>



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
						<h4 class="modal-title" id="myModalLabel">Iten ';
						echo $linha['SKU'];
						echo '</h4>
					</div>
					<div class="modal-body"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
					</div>
				</div>
				</div>';
			}
		?>




		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
 </html>