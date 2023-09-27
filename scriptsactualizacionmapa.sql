/*CAMBIOS NECESARIOS EN LA BASE DE DATOS SELECCIONADA MUJER.SQL*/

/** es necesario a la tabla  agaregarle la  latitud y longitud  para que funjcione el mapa**/

ALTER TABLE `manzanaservicio`
  ADD COLUMN `latitude` DECIMAL(10, 8) NOT NULL,
  ADD COLUMN `longitude` DECIMAL(11, 8) NOT NULL;

