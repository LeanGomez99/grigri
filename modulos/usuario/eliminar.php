<?php

require_once '../../clases/Usuario.php';

$id = $_GET['id'];

Usuario::eliminar($id);

header("location: /grigri/modulos/usuario/listado.php");

?>