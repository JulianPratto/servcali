<?php
include_once('../database.php');
$id = $_POST["id"];
$nom = $_POST["name"];

$sql = "UPDATE rol SET nom_rol='$nom' WHERE id_rol=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
