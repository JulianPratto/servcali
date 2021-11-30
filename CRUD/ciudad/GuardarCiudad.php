<?php
include_once('../database.php');
$id = $_POST["id"];
$pai = $_POST["pai"];
$nom = $_POST["nom"];


$sql = "INSERT INTO ciudad values ('$id', '$pai', '$nom');";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();