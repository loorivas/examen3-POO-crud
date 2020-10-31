<?php
require_once("modelos/conexion.php");
require_once("modelos/crud.clase.php");

class Crud{
    var $idtareas;
    var $titulo;
    var $descripcion;
    function listarDatos(){
        $conn = new Conexion();
        $cont = $conn->ejecutarConsulta("SELECT * FROM tareas");
        $conn->cerrarConexion();
        return $cont;
    }

    //FUNCION PARA INGRESAR MIS DATOS EN MI BASE DE DATOS
    function ingresarDato($titulo, $descripcion){
        $con = Conexion();
        try{
            //prepare el sql and bind parameters
            $stmt = $conn->prepare('INSERT INTO tareas(titulo, descripcion) VALUES(:a,:b)');  
            $stmt->bindParam(':a',$a);
            $stmt->bindParam(':b',$b);
            //insert a row
            $a = $titulo;
            $b = $descripcion;
            $c = $fecha_registro;
            $stmt->execute();
            echo "<script> alert('Registro Almacenado')</script>";
        }catch(PDOExcepcion $e){
            echo "Error:".$e->getMessage();
        }
        $con->cerrarConexion();
    }

    //FUNCION PARA USAR MI ID
    public static function buscarPorId($id){
        $con = new Conexion();
        $cont = $con->ejecutarConsulta("SELECT * FROM tareas WHERE idtareas =  '$idtareas' ");
        $con->cerrarConexion();
        return $cont['0'];
    }

    //FUNCION PARA ACTUALIZAR MIS DATOS DE MI BASE DE DATOS
    public static function editarDato ($idtareas, $titulo, $descripcion, $fecha_registro){
        $con = new Conexion();
        $con->ejecutarActualizacion("UPDATE tareas SET titulo = '". $titulo->titulo."', descripcion = '". $descripcion->descripcion."', fecha_registro = '". $fecha_registro->fecha_registro."' WHERE idtareas =". $idtareas->idtareas);
        $con->cerrarConexion(); 
    }


    //FUNCION PARA ELIMINAR MIS DATOS DE MI BASE DE DATO POR MEDIO DE MI ID
        public static function eliminarPorId ($id){
            $con = new Conexion();
            $con->ejecutarActualizacion("DELETE FROM tareas WHERE idtareas = $idtareas");
            $con->cerrarConexion(); 
        }
}

?>