<?php 
//require_once("../modelos/crud.clase.php");
//require_once("../funciones/second.php");
    include("../funciones/second.php");
    $send = new Crud();
    switch ($_GET['a']){
    case 'ingr':
        if(!empty($_POST)){
            include_once('../modelos/conexion.php');
            $conn = Conexion();
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consult = $conn->prepare("SELECT * FROM tareas where titulo = '$titulo'");
            $consult->execute();
            $data = $consult->fetch(PDO::FETCH_ASSOC);
            $titulos = $data['titulo'];
            if(($titulos ==  "") or ($titulo != $titulos)){
                $save = $send->ingresarDato($titulo,$descripcion);
                header("location:../index.php");
            }elseif($titulos == $titulo){
                echo "<script> alert('Ya existe $titulo. No puede repetir datos')</script>";
                echo"<meta http-equiv='refresh' content='0; url=http://localhost/examen3_poo/index.php'/ >";
            }

        }else{
            echo "<script> alert('No se recogieron los datos')</script>";
        }
    break;

    case 'edit':
        if(!empty($_POST)){
            $idtareas = $_POST["idtareas"];
            $titulo = $_POST["titulo"];
            $descripcion = $_POST['descripcion'];
            $save = $send->editarDato($idtareas, $titulo, $descripcion);
            header("location:mostrar.php");
        }else{
            header("location:mostrar.php");     
        }
    break;

    case 'elim':
        if (!empty($_POST['idtareas'])) {
            $idtareas=$_POST['idtareas'];
            $save = $send->eliminarPorId($idtareas);
            header("location:mostrar.php");
        }else{
            header("location:mostrar.php");
        }
        //Crud::eliminarPorId($_GET['idtareas']);

    }

    header("Location: ../index.php");
?>