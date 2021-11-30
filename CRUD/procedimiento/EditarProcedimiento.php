<?php
include_once('../database.php');
$id = $_POST["id"];
$emp=$_POST["emp"];
$cli = $_POST["cli"];
$tip = $_POST["tip"];
$des = $_POST["des"];


$sql = "UPDATE procedimiento SET id_empleado='$emp', id_cliente='$cli', tipo='$tip', descripcion='$des'
        WHERE id_procedimiento=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
