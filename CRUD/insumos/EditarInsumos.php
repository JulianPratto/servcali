<?php
include_once('../database.php');
$id = $_POST["id"];
$pos=$_POST["pos"];
$mat=$_POST["mat"];
$can=$_POST["can"];



$sql = "UPDATE insumo SET id_procedimiento='$pos', id_materiaprima='$mat', cantidad_insumos='$can'
        WHERE id_insumo=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
