<?php
include_once('../database.php');
$id = $_POST["id"];
$pos=$_POST["pos"];
$mat=$_POST["mat"];
$can=$_POST["can"];


$sql = "INSERT INTO insumo values (NULL, '$pos', '$mat', '$can');";  

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();