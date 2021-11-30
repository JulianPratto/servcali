<?php
include_once('../database.php');
$id = $_POST["id"];
$name = $_POST["name"];
$fec_nac = $_POST["fec_nac"];
$date=date("Y-m-d",strtotime($fec_nac)); 
$email = $_POST["email"];
$cel = $_POST["cel"];
$peso = $_POST["peso"];
$est = $_POST["est"];
$dir = $_POST["dir"];
$contra = $_POST['contra'];
$rol = $_POST["rol"];
$sede = $_POST['sede'];

$sql = "INSERT INTO empleado values ('$id','' '$name', '$date', '$email', '$cel', '$peso', '$est', '$dir', '$contra', '$rol', '$sede');";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();
