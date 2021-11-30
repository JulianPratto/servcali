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
$contra = $_POST['contra'];


$sql = "INSERT INTO cliente values (NULL, '$name', '$date', '$cel', '$email', '$peso', '$est', '$dir', '$contra', '1');";
//      INSERT INTO cliente values (NULL, 'sdfghsd', '2001-02-21', '165153', 'sdghsd', '15', '156', 'sdfhdsf', 'sdfghdsf', '1');

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();