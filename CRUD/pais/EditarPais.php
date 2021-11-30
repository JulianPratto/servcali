<?php
include_once('../database.php');
$id = $_POST["id"];
$nom = $_POST["name"];

$sql = "UPDATE pais SET nom_pais='$nom' WHERE id_pais='$id'";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
