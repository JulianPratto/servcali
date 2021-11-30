<?php
include_once('../database.php');
$id = $_POST["id"];

$sql = "DELETE FROM empleado WHERE id_empleado=$id";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$conexion->close();
