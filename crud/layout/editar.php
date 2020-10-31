<?php
    require_once '../modelos/conexion.php';
    $connection = conexion();
    $idtareas = $_GET['idtareas'];
    $sql = "SELECT * from tareas where idtareas = '$idtareas'";
    $query = $connection->prepare($sql);

    $query->execute();
    $rowcount = $query->rowcount();

    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }
?>

<script type="text/javascript" src="editar.js"></script>
<?php include '../layout/header.php'?>
<div class="container">
    <div class="row mt-3 justify-content-md-center">
        <div class="col-md-6">
            <h1>Tareas pendientes</h1>
            <h2>Actualizar tarea</h2>
            <form action="../controladores/crud.controlador.php?a=edit" method="POST">
                <?php 
                foreach($model as $row){
                ?>
                <input type="hidden" name="idtareas" placeholder="Identificardor" required value="<?php echo $row['idtareas']; ?>" readonly='true'>
                <div class="form-group">
                    <label for="titulo">Titulo: </label>
                    <input class="form-control" name="titulo" placeholder="Titulo"  type="text" value="<?php echo $row['titulo']; ?>">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion: </label>
                    <input class="form-control" name="descripcion" placeholder="Descripcion"  type="text" value="<?php echo $row['descripcion']; ?>">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-block btn-primary" value="Actualizar Datos" name="submit">
                    </div>
                </div>
            </form>
             <?php 
        } ?>
        </div>
    </div>

</div>
<?php include '../layout/footer.php'?>