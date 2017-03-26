-- Todos los titulos de las peliculas

SELECT title FROM `film` WHERE 1;

-- Cuantos actores hay

SELECT count(*) FROM `actor` WHERE 1

-- TODOS Los nombres y duracion (descendentemente) con drama en la descripcion

SELECT title, length FROM `film` WHERE `description` LIKE '%drama%' ORDER by length DESC

-- • Nombres de actores (first_name) y cuantas veces están
-- repetidos, mostrando solo los que se repitan más de una vez y
-- ordenados de mayor a menor por número de repeticiones.
SELECT COUNT(`first_name`) ,`first_name`  FROM `actor` 
 
GROUP BY `first_name` 
HAVING COUNT(`first_name`)>1
ORDER BY COUNT(`first_name`) DESC

-- Devuelve el título de cada película junto con su idioma (nombre
-- del idioma, no su identificador).
SELECT  `language`.`name`,`title`FROM `film` 
JOIN `language` ON (`language`.`language_id`=`film`.`language_id`)

-- • ¿Hay alguna película en un lenguaje cuyo nombre no sea
-- “English”? Observando la tabla language_id se ve que la id del ingles es 1
SELECT title FROM `film` WHERE language_id!=1

-- • Añade el lenguaje español. Analiza la tabla “languaje” para ver
-- si tiene algún auto-numérico o algún valor por defecto que nos
-- puedan resultar útiles.

INSERT INTO `language`(`language_id`, `name`, `last_update`) VALUES ('','Spanish','')
-- he tenido problemas con lo de la fecha de actualizacion, pero lo he resuelto poniendo esto: 
UPDATE `language` SET `name`='Españool' WHERE `language_id`=7
UPDATE `language` SET `name`='Spanish' WHERE `language_id`=7


-- • Añade el lenguaje español. Analiza la tabla “languaje” para ver
-- si tiene algún auto-numérico o algún valor por defecto que nos
-- puedan resultar útiles.
UPDATE `actor` SET `last_name`='LEE-DAVIS' WHERE `actor_id`=4









