/*CAMBIOS NECESARIOS EN LA BASE DE DATOS SELECCIONADA MUJER.SQL*/

/** es necesario a la tabla  agaregarle la  latitud y longitud  para que funjcione el mapa**/

ALTER TABLE `manzanaservicio`
  ADD COLUMN `latitude` DECIMAL(10, 8) NOT NULL,
  ADD COLUMN `longitude` DECIMAL(11, 8) NOT NULL;

/* SE DEBE ELIMINAR  LA TABLA  ADMIN  Y VOLVERLA A CREAR  ASI PARA IMPLMENTAR PREGUNTAS DE SEGURIDAD */

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `tipoDocumento` varchar(50) NOT NULL,
  `documento` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correoElectronico` varchar(50) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `contraseña` varchar(25) NOT NULL,
  `pregunta1` varchar(255) DEFAULT NULL,
  `respuesta1` varchar(255) DEFAULT NULL,
  `pregunta2` varchar(255) DEFAULT NULL,
  `respuesta2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
