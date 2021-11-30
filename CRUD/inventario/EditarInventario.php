<?php
include_once('../database.php');
$id = $_POST["id"];
$sede=$_POST["sede"];
$materia = $_POST["materia"];
$cantidad = $_POST["cantidad"];


$sql = "UPDATE inventario_sede SET id_sede='$sede', id_materiaprima='$materia', cantidad='$cantidad'
        WHERE id_inventario=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
