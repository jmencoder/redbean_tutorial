<?php

// Importamos el archivo rb.php (ORM RedBean)
require "rb.php";

// Instaciamos la clase R
$db = new R();

// ANTES DE INICIAR (Debemos crear la base de datos a la cual nos conectaremos)
// Configuramosla coneccion
$db->setup("mysql:host=localhost;port=3307;dbname=redbean","root", "");
// freeze nos permite controlar el comportamiendo del ORM para desarrollo o para prodcucción
$db->freeze(false);
// nuke limpia los datos en nustra base de datos
// Limpiamos la tabla
$db->nuke();

/**
 * CREANDO TABLAS Y AGREGANDO REGISTROS
 * 
 * Como crear TABLAS
 * creamos y utilizamos tablas de la siguiente forma
 * ->dispense("nombre tabla")
 * 
 * $tabla = $db->dispense("nombre tabla");
 * 
 * A traves de la variable $tabla podremos definir las columnas de la misma de la siguiente forma
 * $tabla->columna = "" // Tipo string (Se ajusta segun la cantidad de texto que se le ingresa)
 * $tabla->columna = 1564 // Tipo number
 * $tabla->columna = '19:00:00'; //Time
 * $tabla->columna = '1995-12-05'; //Date
 * $tabla->columna = '1995-12-05 19:00:00'; //Date time
 * 
 * Ejecutamos el esquema de la siguiente forma
 * 
 * $id = $db->store($tabla);
 * 
 * La variable $id alamacenara el ID que corresponde al ultimo registro
 * $db es la instancia de redbean declarada al principio de este documento
 * ->store(variable con estructura) ejectuta el esquema que hemos declarado
 */
// Escribimos la estructura de nuestra tabla
$libros = $db->dispense("libros"); // Definimos Nombre de Tabla (Si no existe la crea)
$libros->titulo = "Juego de Tronos"; // Definimos columna y datos (Si la columna ya existe se agregara una nueva fila)
$libros->autor = "George R. Martin";
$libros->publicado = 1996;
$libros->saga = "Juego de Tronos";
// Ejecutamos esquema
$id = $db->store($libros);



/**
 * Como agregar varios registros a las vez en una TABLA 
 * Esto lo hacemos declarando un arreglo junto a los parametros anteriores de la siguiente forma
 * 
 * creamos y utilizamos tablas de la siguiente forma
 * * ->dispense("nombre tabla")
 * 
 * $tabla = $db->dispense("nombre tabla");
 * 
 * Debemos declarar las tablas dentro de un arreglo por la cantidad de columnas que tenga tu tabla
 * $tabla = []
 * $tabla[] = $db->dispense("nombre tabla");
 * $tabla[] = $db->dispense("nombre tabla");
 * 
 * A traves de la variable $tabla indicamos el indice al que definiremos o agregaremos columas y datos
 * el indice representa el numero de fila que afectaremos
 * ------------------------------------------------------------------------------------------
 * $tabla[0]->columna = "Texto en la primera linea" // Tipo string (Se ajusta segun la cantidad de texto que se le ingresa)
 * $tabla[1]->columna = "Teto en la segunda linea" // Tipo number
 * 
 * Ejecutamos el esquema de diferente forma para este arreglo
 * 
 * $id = $db->storeAll($tabla);
 * 
 * La variable $id alamacenara en un arreglo los ID que correspondan a los registros agregados
 * $db es la instancia de redbean declarada al principio de este documento
 * ->storeAll(variable con estructura) ejectuta el esquema que hemos declarado
 * Ojo nota que ahora para ejecutar el equema usamos ->storeAll
 */

// nuke limpia los datos en nustra base de datos
// Limpiamos la tabla
$db->nuke();
// Escribimos la estructura de nuestra tabla
$libros = [];
//Iniciamos tabla 
$libros[] = $db->dispense("libros"); // Definimos Nombre de Tabla (Si no existe la crea)
$libros[0]->titulo = "Juego de Tronos"; // Definimos columna y datos (Si la columna ya existe se agregara una nueva fila)
$libros[0]->autor = "George R. Martin";
$libros[0]->publicado = 1996;
$libros[0]->saga = "Juego de Tronos";
//Iniciamos tabla
$libros[] = $db->dispense("libros"); // Definimos Nombre de Tabla (Si no existe la crea)
$libros[1]->titulo = "Choque de Reyes"; // Definimos columna y datos (Si la columna ya existe se agregara una nueva fila)
$libros[1]->autor = "George R. Martin";
$libros[1]->publicado = 1998;
$libros[1]->saga = "Juego de Tronos";
//Iniciamos tabla
$libros[] = $db->dispense("libros"); // Definimos Nombre de Tabla (Si no existe la crea)
$libros[2]->titulo = "Tormenta de Espadas"; // Definimos columna y datos (Si la columna ya existe se agregara una nueva fila)
$libros[2]->autor = "George R. Martin";
$libros[2]->publicado = 2000;
$libros[2]->saga = "Juego de Tronos";
//Iniciamos tabla
$libros[] = $db->dispense("libros"); // Definimos Nombre de Tabla (Si no existe la crea)
$libros[3]->titulo = "Festin de Cuervos"; // Definimos columna y datos (Si la columna ya existe se agregara una nueva fila)
$libros[3]->autor = "George R. Martin";
$libros[3]->publicado = 2005;
$libros[3]->saga = "Juego de Tronos";
//Iniciamos tabla
$libros[] = $db->dispense("libros"); // Definimos Nombre de Tabla (Si no existe la crea)
$libros[4]->titulo = "Divergente"; // Definimos columna y datos (Si la columna ya existe se agregara una nueva fila)
$libros[4]->autor = "Veronica Roth";
$libros[4]->publicado = 2011;
$libros[4]->saga = "Divergente";
//Iniciamos tabla
$libros[] = $db->dispense("libros"); // Definimos Nombre de Tabla (Si no existe la crea)
$libros[5]->titulo = "Insurgente"; // Definimos columna y datos (Si la columna ya existe se agregara una nueva fila)
$libros[5]->autor = "Veronica Roth";
$libros[5]->publicado = 2012;
$libros[5]->saga = "Divergente";
//Iniciamos tabla
$libros[] = $db->dispense("libros"); // Definimos Nombre de Tabla (Si no existe la crea)
$libros[6]->titulo = "Leal"; // Definimos columna y datos (Si la columna ya existe se agregara una nueva fila)
$libros[6]->autor = "Veronica Roth";
$libros[6]->publicado = 2013;
$libros[6]->saga = "Divergente";
// Ejecutamos esquema
$id = $db->storeAll($libros);

/**
 * ACTUALIZANDO REGISTROS Y TABLAS
 * 
 * Como actualizamos nuestros registros
 * Para actualizar nuestros registros debemos conocer el ID del registro que deseamos actualizar
 * 
 * $tabla = $db->loadForUpdate("nombre tabla", 1);
 * 
 * Como ya sabemos $tabla es la variable en la que alojaremos el objeto resultante
 * $db es la instancia del redbean y ->loadForUpdate es el metodo por el cual obtendremos y prepararemos
 * el registro que deamos actualizar el numero 1 que encontramos en el ejemplo representa el ID que
 * estamos buscando para actualizar
 * 
 */

// Para el ejemplo cambiaremos el Libro en el indice 3 (Tormenta de Espadas) y reemplazaremos por
// DANZA CON DRAGONES si revisamos nuestra base de datos esto deberia cambiar el nombre 
$libros = $db->loadForUpdate("libros", 3);
$libros->titulo = "DANZA CON DRAGONES";
// Ejecutamos esquema
$db->store($libros);

/**
 * OJO: al actualizar un registro tambien podemos actualizar nuestra tabla agregando nuesvas columnas
 * ----------------------------------------
 * $tabla->columna = "";
 * $tabla->columna = 1564 // Tipo number
 * $tabla->columna = '19:00:00'; //Time
 * $tabla->columna = '1995-12-05'; //Date
 * $tabla->columna = '1995-12-05 19:00:00'; //Date time
 * ------------------------------------------
 */

/**
 * CONSULTANDO DATOS
 * Recuperar datos para presentar
 * 
 * Para esta accion podemos hacerlo hacia un registro especifico o bien hacia toda la tabla
 * tambien podemos aplicar condiciones para buscar nuestros registros
 * 
 * Extrayendo un registro por su ID 
 * --------------------------------------------
 * $registro = $db->load("libros", 2);
 * --------------------------------------------
 * 
 * 
 * Extrayendo un registros por condiciones
 * --------------------------------------------
 * $registros = $db->find("libros", "columna = 'condición'");
 * --------------------------------------------
 * 
 * 
 * Extrayendo todos los registros de una tabla completos o parametrizados por condiciones
 * --------------------------------------------
 * $registros = $db->findAll( 'libros' );
 * $registros = $db->findAll( 'libros' , ' ORDER BY titulo DESC LIMIT 10 ' );
 * --------------------------------------------
 * 
 */

// Consultar registro 6
$registro = $db->load("libros", 6);
// Imprime el resultado para ver lo que te retorna
// print_r($registro);

// Consultar registros que pertenezcan a la saga (Divergente)
$registros = $db->find("libros", "saga = 'Divergente'");
// Imprime el resultado para ver lo que te retorna
// print_r($registros);

// Consultar todos los registros en tabla (libros)
$registros = $db->findAll("libros");
// Imprime el resultado para ver lo que te retorna
// print_r($registros);

// Consultar todos los registros en tabla (libros) ordenados por (titulo) y mostrar solo 3 registros 
// como maximo
$registros = $db->findAll("libros", "ORDER BY titulo LIMIT 3");
// Imprime el resultado para ver lo que te retorna
// print_r($registros);

/**
 * BORRANDO DATOS
 * Si deseamos eliminar registros debemos obtener el Objeto al cual deseamos aplicar esta accion
 * 
 * Remover un registro especifico
 * ----------------------------------------------------
 * $objeto = $db->load("libros", 6);
 * $resultado = $db->trash($objeto);
 * ----------------------------------------------------
 * 
 * 
 * Remover varios registros a la vez (consultando con condicion)
 * -------------------------------------------------------------------
 * $objetos = $db->find("libros", "saga = 'Divergente'");
 * $resultado = $db->trashAll($objetos);
 * -------------------------------------------------------------------
 * 
 *
 * Limpiar tabla completa
 * --------------------------------- 
 * $db->wipe("libros");
 * ---------------------------------
 * 
 */

/**
 * Descomenta para ver resultado en tus tablas 
 * */

// $objeto = $db->load("libros", 6);
// $resultado = $db->trash($objeto);

// $objetos = $db->find("libros", "saga = 'Divergente'");
// $resultado = $db->trashAll($objetos);

// $db->wipe("libros");

// Cerramos conexión
$db->close();
