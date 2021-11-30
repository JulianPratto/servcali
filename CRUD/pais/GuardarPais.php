<?php
include_once('../database.php');
$id = $_POST["id"];
$nom = $_POST["name"];


$sql = "INSERT INTO pais values ('$id', '$nom');";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();