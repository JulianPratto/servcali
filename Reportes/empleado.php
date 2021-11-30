<?php

include("../conexion.php");

$sql = "SELECT e.id_empleado,e.nom_empleado, e.email,e.direccion,r.nom_rol, s.nom_sede 
        FROM empleado AS e 
        INNER JOIN rol AS r ON e.id_rol=r.id_rol
        INNER JOIN sede AS s ON e.id_sede=s.id_sede;";

$resultado = $conexion->query($sql)
	or die(mysqli_errno($this->conexion) . " : "
		. mysqli_error($conexion) . " | Query=" . $sql);

$listado = array();
while ($fila = $resultado->fetch_assoc()) {
	$listado[] = $fila;
}

$conexion->close();
?>

    <?php
    ob_start();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
     integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" 
     crossorigin="anonymous">
    <title>REPORTE DE EMPLEADOS</title>
</head>
    <body>
        <table class="table table-bordered" id=tabla>
            <thead>
                <tr>
                    <th>ID EMPLEADO</th>
                    <th>NOMBRE</th>
                    <th>EMAIL</th>
                    <th>DIRECCION</th>
                    <th>ROL</th>
                    <th>SEDE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listado as $fila) { ?>
                    <tr>
                        <td><?php echo utf8_encode($fila['id_empleado']) ?> </td>
                        <td><?php echo utf8_encode($fila['nom_empleado']) ?> </td>
                        <td><?php echo utf8_encode($fila['email']) ?> </td>
                        <td><?php echo utf8_encode($fila['direccion']) ?> </td>
                        <td><?php echo utf8_encode($fila['nom_rol']) ?> </td>
                        <td><?php echo utf8_encode($fila['nom_sede']) ?> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>

<?php
    $html=ob_get_clean();
    //echo $html;

    require_once '../library/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf =new Dompdf();

    $options =$dompdf->getOptions();
    $options->set(array('isRemoteEnabled'=> true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);

    //$dompdf->setPaper('letter');
    $dompdf->setPaper('A4','landscape');

    $dompdf->render();

    $dompdf->stream("Reporte_Empleados.pdf", array("Attachment" => false));

?>


