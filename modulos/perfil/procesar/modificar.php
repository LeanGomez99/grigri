<?php

session_start();

require_once '../../../clases/Perfil.php';
require_once '../../../clases/PerfilModulo.php';

$idPerfil = $_POST['idPerfil'];
$descripcion = $_POST['txtDescripcion'];
$listaModulos = $_POST['cboModulos'];

if (empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "Debe ingresar la descripcion";
	header("location: /grigri/modulos/perfil/modificar.php?id=$idPerfil");
	exit;
}
if (strlen(trim($descripcion)) < 3) {
	$_SESSION['mensaje_error'] = "Pocos caracteres para una descripcion";
	header("location: /grigri/modulos/perfil/modificar.php?id=$idPerfil");
	exit;
}
if (empty($listaModulos) || $listaModulos[0] == 0) {
	$_SESSION['mensaje_error'] = "Debe seleccionar modulos";
	header("location: /grigri/modulos/perfil/modificar.php?id=$idPerfil");
	exit;
}

$perfil = Perfil::obtenerPorId($idPerfil);
$perfil->setDescripcion($descripcion);

$perfil->actualizar();

PerfilModulo::resetModulos($idPerfil);

foreach ($listaModulos as $modulo_id) {
	$perfilModulo = new PerfilModulo();
	$perfilModulo->setIdPerfil($idPerfil);
	$perfilModulo->setIdModulo($modulo_id);
	$perfilModulo->actualizar($idPerfil);
}

header("location: /grigri/modulos/perfil/listado.php");

?>