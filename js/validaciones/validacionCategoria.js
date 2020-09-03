function validarDatos() {
	var divMensajeError = document.getElementById("mensajeError");
	var nombre = document.getElementById("txtCategoria").value;

	if (nombre.trim() == "") {
		divMensajeError.innerHTML = "<font color='red'> El nombre no debe estar vacio js</font><br><br>";
		return;
	}
	if (nombre.length < 3) {
		divMensajeError.innerHTML = "<font color='red'> El nombre debe contener al menos 3 caracteres js</font><br><br>";
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}