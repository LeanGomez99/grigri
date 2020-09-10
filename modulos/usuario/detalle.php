<?php

require_once "../../clases/Usuario.php";
require_once "../../clases/TipoDocumento.php";

$id = $_GET['id'];

$user = Usuario::obtenerPorId($id);

$tipoDocumento = TipoDocumento::obtenerPorId($user->getIdTipoDocumento());

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<?php require_once '../../menu.php'; ?>

	<table align="center">
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Tipo Documento</th>
			<th>Numero Documento</th>
			<th>Fecha de Nacimiento</th>
			<th>Sexo</th>
			<th>Accion</th>
		</tr>
		<tr>
			<td> <?php echo $user->getNombre(); ?> </td>
			<td> <?php echo $user->getApellido(); ?> </td>
			<td> <?php echo $tipoDocumento; ?> </td>
			<td> <?php echo $user->getNumeroDocumento(); ?> </td>
			<td> <?php echo $user->getFechaNacimiento(); ?> </td>
			<td> <?php echo $user->getSexo(); ?> </td>
			<td>
				<a href="modificar.php?id=<?php echo $user->getIdUsuario(); ?>">Modificar</a>
				-
				<a href="eliminar.php?id=<?php echo $user->getIdPersona(); ?>">Borrar</a>
			</td>
		</tr>

	<?php if (is_null($user->domicilio)) : ?>	    
		<br><br>
	    <a href="/grigri/modulos/domicilio/alta.php?idPersona=<?php echo $user->getIdPersona(); ?>&idLlamada=<?php echo $user->getIdUsuario(); ?>">
	        Agregar Domiclio
	    </a>

	<?php else: ?>
		<br><br>
		<table border="1" align="center">
			<tr>				
				<th>Calle</th>
				<th>Altura</th>
				<th>Casa</th>
				<th>Manzana</th>				
				<th>Barrio</th>
				<th>Localidad</th>
				<th>Descripcion</th>
				<th>Accion</th>
			</tr>
			<tr>				
				<td> <?php echo $user->domicilio->getCalle(); ?> </td>
				<td> <?php echo $user->domicilio->getAltura(); ?> </td>
				<td> <?php echo $user->domicilio->getCasa(); ?> </td>
				<td> <?php echo $user->domicilio->getManzana(); ?> </td>				
				<td> <?php echo $user->domicilio->barrio; ?> </td>
				<td> <?php echo $user->domicilio->barrio->localidad; ?> </td>
				<td> <?php echo $user->domicilio->getDescripcion(); ?> </td>
				<td>
					<a href="/grigri/modulos/domicilio/modificar.php?idPersona=<?php echo $user->getIdPersona(); ?>&idLlamada=<?php echo $user->getIdUsuario(); ?>">
					Modificar Domicilio
					</a>
					-
					<a href="eliminar.php?id=<?php echo $user->getIdPersona(); ?>">Borrar</a>
				</td>
			</tr>
		</table>

	<?php endif ?>

	<br><br>

		<a href="/grigri/modulos/contacto/alta.php?idPersona=<?php echo $user->getIdPersona(); ?>&idLlamada=<?php echo $user->getIdUsuario(); ?>">
		    Agregar Contacto
		</a>

	<br><br>

	<?php foreach ($user->arrContactos as $contacto) : ?>

		<?php echo $contacto; ?>

		<a href="/grigri/modulos/contacto/eliminar.php?id=<?php echo $contacto->getIdPersonaContacto(); ?>&idLlamada=<?php echo $user->getIdUsuario(); ?>">
		    Eliminar
		</a>

		<br>

	<?php endforeach ?>

</body>
</html>
