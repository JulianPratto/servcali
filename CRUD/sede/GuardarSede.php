<?php
include_once('../database.php');
$id = $_POST["id"];
$nom = $_POST["name"];
$cit = $_POST["cit"];

$sql = "INSERT INTO sede values (NULL,'$nom', '$cit');";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();