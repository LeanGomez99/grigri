<!DOCTYPE html>
<html>
<head>
	<title>Alta Modulo</title>

	<script type="text/javascript" src="../../js/validaciones/validacionModulos.js"></script>

</head>
<body>

	<?php require_once '../../menu.php'; ?>

	<div class="main-content">
	    <div class="section__content section__content--p30">
	        <div class="container-fluid">
	            <div class="row">	
					<div class="col-lg-6">
						<div class="card">
			                <div class="card-header">
			                    <strong>Modulo</strong>
			                </div>
			                <div class="card-body card-block">
						            <?php if (isset($_SESSION['mensaje_error'])) : ?>

						                <font color="red"> 
						                	<?php echo $_SESSION['mensaje_error']; ?>
						                </font>
						                <br><br>

						            <?php
						                    unset($_SESSION['mensaje_error']);
						                endif;
						            ?>
								<div id="mensajeError"></div>

			                    <form action="procesar/guardar.php" name="frmDatos" id="frmDatos" method="post" enctype="multipart/form-data">

			                        <div class="row form-group">
						                <div class="col col-md-3">
						                    <label class=" form-control-label">Nombre para el Modulo</label>
						                </div>
						                <div class="col-12 col-md-9">
						                    <input type="text" id="txtModulo" name="txtModulo" class="form-control">
						                </div>
						            </div>
								</form>
                            </div>
			            	<div class="card-footer">
                                <button class="btn btn-primary btn-sm" onclick="validarDatos()">
                                    <i class="fa fa-dot-circle-o"></i> Guardar
                                </button>
                            </div>
                        </div>
		            </div>
	            </div>
	        </div>
	    </div>
	</div>

</body>
</html>