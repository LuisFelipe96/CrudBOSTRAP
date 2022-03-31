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