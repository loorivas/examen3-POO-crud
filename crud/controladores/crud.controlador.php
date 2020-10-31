<?php 
require_once '../funciones/second.php';

    switch ($_GET['a']){
    case 'ingr':
        include_once('../modelos/conexion.php');
        $conn = Conexion();
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $send = new Crud();
        $save=$send->ingresarDato($titulo, $descripcion);
    break;

    case 'edit':
        if(!empty($_POST)){
            include_once('../modelos/conexion.php');
            $conn = Conexion();
            $idtareas = $_POST['idtareas'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $send = new Crud();
            $update=$send->editarDato($idtareas, $titulo, $descripcion);
            header("location:index.php"); 
        }else{
            header("location:index.php");     
        }
    break;

    case 'elim':
        if (!empty($_POST['idtareas'])) {
            include_once('../modelos/conexion.php');
            $idtareas=$_POST['idtareas'];
            $enviar = new Crud();
            $delete=$enviar->eliminarPorId($idtareas);
            header("location:index.php");
        }else{
            header("location:index.php");
        }
    }
    header("Location: ../index.php");
    
?>