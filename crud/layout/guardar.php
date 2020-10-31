<?php include '../layout/header.php'?>
<div class="container">
    <div class="row mt-3 justify-content-md-center">
        <div class="col-md-6">
            <h1>Tareas pendientes</h1>
            <h2>Registrar nueva tarea</h2>
            <form action="../controladores/crud.controlador.php?a=ingr" method="POST">
                <div class="form-group">
                    <label for="titulo">Titulo: </label>
                    <input class="form-control" name="titulo" placeholder="Titulo"  type="text">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion: </label>
                    <input class="form-control" name="descripcion" placeholder="Descripcion"  type="text">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<?php include '../layout/footer.php'?>