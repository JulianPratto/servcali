<?php
include_once('../database.php');
$id = $_POST["id"];

$sql = "DELETE FROM insumo WHERE id_insumo=$id";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$conexion->close();
