<?php
include_once('../database.php');
$id = $_POST["id"];
$sede=$_POST["sede"];
$materia = $_POST["materia"];
$cantidad = $_POST["cantidad"];


$sql = "INSERT INTO inventario_sede values (NULL,  '$sede', '$materia', '$cantidad');";  

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();