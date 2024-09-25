<?php
// c = catálogo
if (!isset($_GET['c'])) {
  require_once "controllers/inicio.controller.php";
  $controlador = new InicioControlador();

  call_user_func(array($controlador, 'Inicio'));
} else {
  $controlador = $_GET['c'];
  require_once "controllers/$controlador.controller.php";
  $controlador = ucwords($controlador) . 'Controlador';


  $controlador = new $controlador();
  //a = acción -> lo que se va a hacer. ejemplo: Guardar, Borrar...
  $accion = isset($_GET['a']) ? $_GET['a'] : 'Inicio';
  call_user_func(array($controlador, $accion));
}
