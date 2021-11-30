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
$contra = $_POST["contra"];
$rol = $_POST["rol"];
$sede = $_POST["sede"];

$sql = "UPDATE empleado SET nom_empleado='$name', fecha_nac='$date', email='$email',
celular='$cel', peso='$peso', estatura='$est', direccion='$dir', contraseña='$contra', id_rol='$rol', 
id_sede='$sede' WHERE id_empleado=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
