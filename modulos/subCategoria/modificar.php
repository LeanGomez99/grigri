<?php

require_once '../../clases/SubCategoria.php';
require_once '../../clases/Categoria.php';

$id = $_GET['id'];

$subCategoria = SubCategoria::obtenerPorId($id);
$listadoCategoria = Categoria::obtenerTodos();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Modificar Sub Categoria</title>
</head>
<body>
<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="idSubCategoria" value="<?php echo $subCategoria->getIdSubCategoria(); ?>">

		    <label>Sub Categoria</label>
		    <input type="text" name="txtSubCategoria" value="<?php echo utf8_encode($subCategoria); ?>">
		    <br><br>

			<label>Categorias:</label>
			<select name="idCategoria">
			    <option value="0">Seleccionar</option>

				<?php
				foreach ($listadoCategoria as $categoria):
					$selected = '';
					if ($subCategoria->getIdCategoria() == $categoria->getIdCategoria()) {
						$selected = "SELECTED";
					}
				?>
					<option value="<?php echo $categoria->getIdCategoria(); ?>" <?php echo $selected; ?> >
					    <?php echo $categoria; ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br>

		    <input type="submit" name="btnGuardar" value="Actualizar">			

		</form>

</div>
</body>
</html>

</body>
</html>