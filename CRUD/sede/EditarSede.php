<?php
include_once('../database.php');
$id = $_POST["id"];
$nom = $_POST["name"];
$cit = $_POST["cit"];

$sql = "UPDATE sede SET nom_sede='$nom', id_ciudad='$cit' WHERE id_sede=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
