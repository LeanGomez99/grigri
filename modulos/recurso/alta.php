<!DOCTYPE html>
<html>
<head>
	<title>Alta Recurso</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
<div align="center">
		<form name="frmDatos" method="POST" action="procesar/guardar.php">

		    <label>Nombre del Recurso</label>
		    <input type="text" name="txtRecurso">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Guardar">			

		</form>

</div>
</body>
</html>