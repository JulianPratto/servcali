<?php
$respuesta=false;
session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_rol'])) {
  $respuesta="yes";
  $listado = array("respuesta"=>$respuesta,"user"=>$_SESSION['user_id'],"rol"=>$_SESSION['user_rol'],"name"=>$_SESSION['user_name'],"rol_t"=>$_SESSION['user_rol_t']);
} else {
  $respuesta="no";
  $listado = array("respuesta"=>$respuesta);
}

echo json_encode($listado)
?>
