<?php
require_once("../modelos/conexion.php");
require_once("../modelos/crud.clase.php");

class Crud{
    var $idtareas;
    var $titulo;
    var $descripcion;

    //FUNCION PARA INGRESAR MIS DATOS EN MI BASE DE DATOS
    function ingresarDato($titulo, $descripcion){
        try{
            include_once('../modelos/conexion.php');
            $con = Conexion();
            //prepare el sql and bind parameters
            $stmt = $con->prepare('INSERT INTO tareas(titulo, descripcion) VALUES(:a,:b)');  
            $stmt->bindParam(':a',$a);
            $stmt->bindParam(':b',$b);
            //insert a row
            $a = $titulo;
            $b = $descripcion;
            $stmt->execute();
            echo "<script> alert('Registro Almacenado')</script>";
        }catch(PDOExcepcion $e){
            echo "Error:".$e->getMessage();
        }
        //$con->cerrarConexion();
    }

    //FUNCION PARA ACTUALIZAR MIS DATOS DE MI BASE DE DATOS
    function editarDato($idtareas, $titulo, $descripcion){
        require_once('../modelos/conexion.php');
        $conn = Conexion();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tareas SET titulo = '$titulo', descripcion = '$descripcion' where idtareas = '$idtareas'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo "<script> alert('Registro Actualizado')</script>";
        //header("location:mostrar.php");
    }
    //funcion que sirve para desactivar registro
    /*function desactivar($id){
        require_once('../modelos/conexion.php');
        $conn = conexion();
        try{
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE grado SET idestado = '2' where idgrado = '$id'";
            $conn->exec($sql);
        }catch(PDOExcepcion $e){
            echo "Error:".$e->getMessage();
        }
    }*/


    //FUNCION PARA ELIMINAR MIS DATOS DE MI BASE DE DATO POR MEDIO DE MI ID
    function eliminarPorId ($idtareas){
        require_once('../modelos/conexion.php');
        $conn = conexion();
        try{
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM tareas WHERE idtareas = '$idtareas'";
            $conn->exec($sql);
        }catch(PDOExcepcion $e){
            echo "Error:".$e->getMessage();
        }
        //$con->ejecutarActualizacion("DELETE FROM tareas WHERE idtareas = $idtareas");
        //$con->cerrarConexion(); 
    }
}

?>