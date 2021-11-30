<?php
include_once('../database.php');
$id = $_POST["id"];
$emp=$_POST["emp"];
$cli = $_POST["cli"];
$tip = $_POST["tip"];
$des = $_POST["des"];


$sql = "INSERT INTO procedimiento values (NULL,  '$emp', '$cli', '$tip', '$des');";  

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();