<?php require_once 'funciones/principal.php'; ?>

<?php
$connection = Conexion();

    $sql = "SELECT * from tareas";
    $query = $connection->prepare($sql);

    $query->execute();
    $rowcount = $query->rowcount();

    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }
?>
<?php include 'layout/header.php'?>
<h1 class="text-center text-dark">Tareas pendientes</h1>
<h2 class="text-center text-dark">Listar</h2>

<!--Estilo a table con DataTables-->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <a href="layout/guardar.php">Ingresar nueva Tarea</a><br><br>
                <table border="1" id="example" class="table table-striped table-hover table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Fecha registro</th>
                            <th colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($model as $row){
                              echo "<tr align='center'>";
                              echo "<td>".$row['idtareas']."</td>";
                              echo "<td align='center'>".$row['titulo']."</td>";
                              echo "<td align='center'>".$row['descripcion']."</td>";
                              echo "<td align='center'>".$row['fecha_registro']."</td>";
                        ?>
                        <td>
                            <a href="layout/editar.php?idtareas=<?php echo $row['idtareas']; ?>" onclick="editar(".$row['idtareas'].")";>Editar</a>
                            <a href="layout/eliminar.php?idtareas=<?php echo $row['idtareas']; ?>">Eliminar</a>
                            <!--onclick="return confirm('Deseas quitar este registro?')"-->
                        <input type="hidden" value="<?php echo $row['idtareas'];?>" id="idtareas<?php echo $row['idtareas'];?>">
                        <input type="hidden" value="<?php echo $row['titulo'];?>" id="titulo<?php echo $row['idtareas'];?>">
                        <input type="hidden" value="<?php echo $row['descripcion'];?>" id="descripcion<?php echo $row['idtareas'];?>">
                        <?php } ?>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'layout/footer.php'?>