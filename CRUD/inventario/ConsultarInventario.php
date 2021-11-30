<?php
include_once('../database.php');
$id = $_POST["id"];

$sql = "SELECT * FROM inventario_sede AS i 
        INNER JOIN sede AS s ON (i.id_sede = s.id_sede)
        INNER JOIN materiaprima AS m ON (i.id_materiaprima = m.id_materiaprima)
        WHERE id_inventario= $id ";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$listado = array();
while ($fila = $resultado->fetch_assoc()) {
    $listado[] = $fila;
}



echo json_encode($listado[0]);
$conexion->close();
