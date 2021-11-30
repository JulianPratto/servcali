<?php
include_once('../database.php');
$id = $_POST["id"];
$name = $_POST["name"];
$fec_nac = $_POST["fec_nac"];
$date=date("Y-m-d",strtotime($fec_nac)); 
$cel = $_POST["cel"];
$email = $_POST["email"];
$peso = $_POST["peso"];
$est = $_POST["est"];
$dir = $_POST["dir"];
$contra = $_POST["contra"];

$sql = "UPDATE cliente SET nom_cliente='$name', fecha_nac='$date', celular='$cel',
email='$email', peso='$peso', estatura='$est', direccion='$dir', contraseña='$contra' WHERE id_cliente=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
