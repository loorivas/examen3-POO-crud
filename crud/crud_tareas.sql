CREATE DATABASE crud_tareas;
use crud_tareas;
CREATE TABLE `tareas` (
  `idtareas` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_registro` timestamp NOT NULL,
  PRIMARY KEY (`idtareas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;