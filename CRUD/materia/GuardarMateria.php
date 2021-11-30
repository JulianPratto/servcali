<?php
include_once('../database.php');
$id = $_POST["id"];
$des = $_POST["des"];


$sql = "INSERT INTO materiaprima values ('$id', '$des');";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();