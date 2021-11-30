<?php
include_once('../database.php');
$id = $_POST["id"];

$sql = "SELECT * FROM ciudad WHERE id_ciudad=$id";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$listado = array();
while ($fila = $resultado->fetch_assoc()) {
    $listado[] = $fila;
}



echo json_encode($listado[0]);
$conexion->close();
