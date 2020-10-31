<?php include '../layout/header.php'?>
<div class="container">
    <div class="row mt-3 justify-content-md-center">
        <div class="col-md-6">
            <h1 class="text-center text-dark">Tareas pendientes</h1>
            <h2 class="text-center text-dark">Desactivar tarea</h2>
			<!-- Modal para desactivar un dato de x valor -->
			<form class="form-horizontal" action="../controladores/crud.controlador.php?a=elim" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
				<div class="modal-footer"><br>
					<div class="col-md-11">
	                    <div class="form-group">
							<img src="warning.png">  <font size="4"> ¿Realmente desea desactivar este registro?</font><br>
							<?php
								$idtareas = $_GET['idtareas'];
							?>
						</div>
					</div>
				</div>
				<div class="modal-header"><br>
					<div class="col-md-9">
	                    <div class="form-group">
							<input name="idtareas" id="idtareas" value="<?php echo $idtareas; ?>" readonly="">
						</div>
					</div>
				</div>
				<div class="modal-footer"><br>
					<div class="col-md-9">
                    	<div class="form-group">
							<button type="button" class="btn btn-success" data-dismiss="modal"><span class="fa fa-close"></span> <a href="../index.php" style="color: white;">Cancelar</a> </button>
							<button type="submit" id="guardar_datos" class="btn btn-danger"><span class="fa fa-trash-o"> </span> Aceptar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="editar.js"></script>
<?php include '../layout/footer.php'?>