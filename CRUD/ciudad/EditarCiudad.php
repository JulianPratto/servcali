<?php
include_once('../database.php');
$id = $_POST["id"];
$nom = $_POST["nom"];

$sql = "UPDATE ciudad SET nom_ciudad='$nom' WHERE id_ciudad=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
