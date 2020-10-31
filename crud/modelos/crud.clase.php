<?php
    class Tareas{
        public $idtareas;
        public $titulo;
        public $descripcion;
        public function __construct()
        {
            $this->idtareas = 0;
            $this->titulo = "";
            $this->descripcion = "";
        }
    }
?>