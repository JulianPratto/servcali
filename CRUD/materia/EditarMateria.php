<?php
include_once('../database.php');
$id = $_POST["id"];
$des = $_POST["des"];

$sql = "UPDATE materiaprima SET descripcion='$des' WHERE id_materiaprima=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
